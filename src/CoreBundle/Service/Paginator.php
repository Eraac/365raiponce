<?php

namespace CoreBundle\Service;

use Doctrine\ORM\QueryBuilder;
use Hateoas\Configuration\Route;
use Hateoas\Representation\Factory\PagerfantaFactory;
use Hateoas\Representation\PaginatedRepresentation;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Request;

class Paginator
{
    const LIMIT = "_max_per_page";
    const PAGE  = "_page";
    const DEFAULT_LIMIT = 20;
    const HARD_LIMIT_PER_PAGE = 200;

    /**
     * @param QueryBuilder $qb
     * @param Request $request
     * @param array $routeParameters
     *
     * @return PaginatedRepresentation
     */
    public function paginate(QueryBuilder $qb, Request $request, array $routeParameters = []) : PaginatedRepresentation
    {
        $routeName = $request->get('_route');
        $criterias = $request->query->all();

        $pager = new Pagerfanta(new DoctrineORMAdapter($qb, true, false));

        $pager->setMaxPerPage($this->getLimitPerPage($criterias))
              ->setCurrentPage($this->getPage($criterias));

        $pff = new PagerfantaFactory(self::PAGE, self::LIMIT);

        return $pff->createRepresentation($pager, new Route($routeName, array_merge($criterias, $routeParameters)));
    }

    /**
     * @param QueryBuilder $qb
     * @param Request      $request
     *
     * @return array
     */
    public function paginateStats(QueryBuilder $qb, Request $request) : array
    {
        $criterias = $request->query->all();

        $limit = $this->getLimitPerPage($criterias, 0);

        if ($limit) {
            $qb
                ->setMaxResults($limit)
                ->setFirstResult($limit * ($this->getPage($criterias) - 1))
            ;
        }

        return $qb->getQuery()->getArrayResult();
    }

    /**
     * @param array $criterias
     *
     * @return integer
     */
    private function getPage(array $criterias) : int
    {
        $page = $criterias[self::PAGE] ?? 1;

        // avoid negative number
        return $page >= 1 ? $page : 1;
    }

    /**
     * @param array $criterias
     * @param int   $default
     *
     * @return integer
     */
    private function getLimitPerPage(array $criterias, int $default = self::DEFAULT_LIMIT) : int
    {
        $limit = $criterias[self::LIMIT] ?? $default;

        // avoid negative number
        $limit = $limit >= 1 ? $limit : $default;

        // avoid too large limit
        return $limit > self::HARD_LIMIT_PER_PAGE ? $default : $limit;
    }
}

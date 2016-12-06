<?php

namespace UserBundle\Repository;

use CoreBundle\Repository\AbstractDateRepository;
use Doctrine\ORM\QueryBuilder;

class UserRepository extends AbstractDateRepository
{
    /**
     * @return QueryBuilder
     */
    public function qbFindAll() : QueryBuilder
    {
        return $this->createQueryBuilder('u');
    }

    /**
     * @param QueryBuilder $qb
     * @param string|array $username
     *
     * @return QueryBuilder
     */
    public function filterByUsername(QueryBuilder $qb, $username) : QueryBuilder
    {
        return $this->filterBy($qb, 'username', $username);
    }

    /**
     * @param \DateTime $from
     * @param \DateTime $to
     *
     * @return int
     */
    public function countAll(\DateTime $from, \DateTime $to) : int
    {
        $qb = $this->count('u');

        $qb = $this->filterByPeriod($qb, $from, $to);

        return $qb->getQuery()->getSingleScalarResult();
    }
}

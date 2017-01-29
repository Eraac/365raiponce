<?php

namespace CoreBundle\Repository;

use CoreBundle\Entity\Action;
use Doctrine\ORM\QueryBuilder;
use UserBundle\Entity\User;

/**
 * HistoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class HistoryRepository extends AbstractRepository
{
    /**
     * @return QueryBuilder
     */
    public function qbFindAll() : QueryBuilder
    {
        return $this->createQueryBuilder('h');
    }

    /**
     * @param User $user
     *
     * @return QueryBuilder
     */
    public function qbFindAllByUser(User $user) : QueryBuilder
    {
        $qb = $this->qbFindAll();

        $qb
            ->andWhere($qb->expr()->eq('h.user', ':user'))
            ->setParameter('user', $user)
        ;

        return $qb;
    }

    /**
     * @param Action    $action
     * @param User      $user
     * @param \DateTime $day
     *
     * @return int
     */
    public function countActionForUserAndDay(Action $action, User $user, \DateTime $day) : int
    {
        $qb = $this->createQueryBuilder('h');
        $expr = $qb->expr();

        $today    = $day->modify('today');
        $tomorrow = $today->modify('tomorrow');

        $qb
            ->select($expr->count('h.id'))
            ->where(
                $expr->eq('h.action', ':action'),
                $expr->eq('h.user', ':user'),
                $expr->gte('h.createdAt', ':today'),
                $expr->lt('h.createdAt', ':tomorrow')
            )
            ->setParameters([
                'action'    => $action,
                'user'      => $user,
                'today'     => $today,
                'tomorrow'  => $tomorrow,
            ])
        ;

        return $qb->getQuery()->getSingleScalarResult();
    }
}
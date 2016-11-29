<?php

namespace CoreBundle\Repository;

use CoreBundle\Entity\Response;
use UserBundle\Entity\User;

/**
 * VoteResponseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VoteResponseRepository extends AbstractDateRepository
{
    /**
     * @param Response $response
     * @param User     $user
     *
     * @return bool
     */
    public function userHasVoteFor(Response $response, User $user) : bool
    {
        $qb = $this->createQueryBuilder('v');

        $expr = $qb->expr()->count('v.id');

        $qb->select($expr)
            ->where(
                'v.user = :user',
                'v.response = :response'
            )
            ->setParameters([
                'user' => $user,
                'response' => $response
            ])
        ;

        return (bool) $qb->getQuery()->getSingleScalarResult();
    }
}
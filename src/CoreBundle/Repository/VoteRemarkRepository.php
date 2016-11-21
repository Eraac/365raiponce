<?php

namespace CoreBundle\Repository;

use CoreBundle\Entity\Remark;
use UserBundle\Entity\User;

/**
 * VoteRemarkRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VoteRemarkRepository extends AbstractDateRepository
{
    /**
     * @param Remark $remark
     * @param User   $user
     * @param int    $type
     *
     * @return bool
     */
    public function userHasVoteFor(Remark $remark, User $user, int $type) : bool
    {
        $qb = $this->createQueryBuilder('v');

        $expr = $qb->expr()->count('v.id');

        $qb->select($expr)
            ->where(
                'v.user = :user',
                'v.remark = :remark',
                'v.type = :type'
            )
            ->setParameters([
                'user' => $user,
                'remark' => $remark,
                'type' => $type
            ])
        ;

        return (bool) $qb->getQuery()->getSingleScalarResult();
    }
}

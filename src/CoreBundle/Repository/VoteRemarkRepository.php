<?php

namespace CoreBundle\Repository;

use CoreBundle\Entity\Remark;
use CoreBundle\Service\KeyBuilder;
use Doctrine\ORM\QueryBuilder;
use UserBundle\Entity\User;

/**
 * VoteRemarkRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VoteRemarkRepository extends AbstractVoteRepository
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

        $query = $qb
            ->getQuery()
            ->useResultCache(true, $this->lifetimeCacheVoteUser, KeyBuilder::keyUserHasVoteForRemark($remark, $user, $type))
        ;

        return (bool) $query->getSingleScalarResult();
    }

    /**
     * @param Remark $remark
     * @param int    $type
     *
     * @return int
     */
    public function countVoteForRemark(Remark $remark, int $type) : int
    {
        $qb = $this->createQueryBuilder('v');
        $expr = $qb->expr();

        $qb
            ->select($expr->count('v.id'))
            ->where(
                $expr->eq('v.remark', ':remark'),
                $expr->eq('v.type', ':type')
            )
            ->setParameters([
                'remark' => $remark,
                'type'   => $type,
            ])
        ;

        $query = $qb
            ->getQuery()
            ->useResultCache(true, $this->lifetimeCacheCountVote, KeyBuilder::keyCountVoteForRemark($remark, $type))
        ;

        return $query->getSingleScalarResult();
    }

    /**
     * @param \DateTime $from
     * @param \DateTime $to
     * @param int       $type
     *
     * @return int
     */
    public function countAll(\DateTime $from, \DateTime $to, int $type) : int
    {
        $qb = $this->count('v');

        $qb = $this->filterByPeriod($qb, $from, $to);

        $qb
            ->andWhere('v.type = :type')
            ->setParameter('type', $type)
        ;

        return $qb->getQuery()->getSingleScalarResult();
    }

    /**
     * @param QueryBuilder $qb
     * @param int|array    $emotion
     *
     * @return QueryBuilder
     */
    public function filterByEmotion(QueryBuilder $qb, $emotion) : QueryBuilder
    {
        $alias = 'e';

        $this->safeLeftJoin($qb, 'remark', 're');
        $this->safeLeftJoin($qb, 'emotion', $alias, 're.');

        return $this->getEqOrIn($qb, $emotion, $alias . '.id', 'emotion');
    }

    /**
     * @param QueryBuilder $qb
     * @param int|array    $theme
     *
     * @return QueryBuilder
     */
    public function filterByTheme(QueryBuilder $qb, $theme) : QueryBuilder
    {
        $alias = 't';

        $this->safeLeftJoin($qb, 'remark', 're');
        $this->safeLeftJoin($qb, 'theme', $alias, 're.');

        return $this->getEqOrIn($qb, $theme, $alias . '.id', 'theme');
    }

    /**
     * @param QueryBuilder $qb
     * @param int|array    $remark
     *
     * @return QueryBuilder
     */
    public function filterByRemark(QueryBuilder $qb, $remark) : QueryBuilder
    {
        return $this->filterByWithJoin($qb, 'remark', $remark, 'r');
    }

    /**
     * @param QueryBuilder $qb
     * @param int|array    $type
     *
     * @return QueryBuilder
     */
    public function filterByType(QueryBuilder $qb, $type) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        return $this->getEqOrIn($qb, $type, $alias . 'type', 'type');
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $groupBy
     *
     * @return QueryBuilder
     */
    public function groupByEmotion(QueryBuilder $qb, string $groupBy) : QueryBuilder
    {
        $this->safeLeftJoin($qb, 'remark', 'r');
        $this->safeLeftJoin($qb, 'emotion', 'e', 'r.');

        return $this->groupBy($qb, 'e.id', 'emotion_id');
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $groupBy
     *
     * @return QueryBuilder
     */
    public function groupByTheme(QueryBuilder $qb, string $groupBy) : QueryBuilder
    {
        $this->safeLeftJoin($qb, 'remark', 'r');
        $this->safeLeftJoin($qb, 'theme', 't', 'r.');

        return $this->groupBy($qb, 't.id', 'theme_id');
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $groupBy
     *
     * @return QueryBuilder
     */
    public function groupByType(QueryBuilder $qb, string $groupBy) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        return $this->groupBy($qb, $alias . 'type', 'type');
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $groupBy
     *
     * @return QueryBuilder
     */
    public function groupByRemark(QueryBuilder $qb, string $groupBy) : QueryBuilder
    {
        $this->safeLeftJoin($qb, 'remark', 'r');

        return $this->groupBy($qb, 'r.id', 'remark_id');
    }
}

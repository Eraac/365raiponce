<?php

namespace CoreBundle\Repository;

use Doctrine\ORM\QueryBuilder;

abstract class AbstractVoteRepository extends AbstractDateRepository
{
    /**
     * @var int Number of second keep in cache vote for one user
     */
    protected $lifetimeCacheVoteUser;

    /**
     * @var int Number of second keep in cache count vote
     */
    protected $lifetimeCacheCountVote;


    /**
     * @param int $lifetimeCacheVoteUser
     * @param int $lifetimeCacheCountVote
     */
    public function setLifetimeCache(int $lifetimeCacheVoteUser, int $lifetimeCacheCountVote)
    {
        $this->lifetimeCacheVoteUser = $lifetimeCacheVoteUser;
        $this->lifetimeCacheCountVote = $lifetimeCacheCountVote;
    }

    /**
     * @param QueryBuilder $qb
     * @param int|array    $voter
     *
     * @return QueryBuilder
     */
    public function filterByVoter(QueryBuilder $qb, $voter) : QueryBuilder
    {
        return $this->filterByWithJoin($qb, 'user', $voter, 'vo');
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $orderBy
     * @param string       $order
     *
     * @return QueryBuilder
     */
    public function orderByVoter(QueryBuilder $qb, string $orderBy, string $order) : QueryBuilder
    {
        $alias = 'vo';

        $this->safeLeftJoin($qb, 'user', $alias);

        return $this->applyOrder($qb, '.username', $order, $alias);
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $groupBy
     *
     * @return QueryBuilder
     */
    public function groupByVoter(QueryBuilder $qb, string $groupBy) : QueryBuilder
    {
        $alias = 'vo';

        $this->safeLeftJoin($qb, 'user', $alias);

        return $this->groupBy($qb, $alias . '.id', 'voter_id');
    }
}

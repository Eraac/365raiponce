<?php

namespace Tests\CoreBundle\Filter\Stats;

use CoreBundle\Filter\AbstractFilter;
use CoreBundle\Repository\RemarkRepository;
use Doctrine\ORM\QueryBuilder;
use Tests\CoreBundle\Filter\AbstractStatsFilterTest;

class VoteRemarkFilterTest extends AbstractStatsFilterTest
{
    protected function getFilter() : AbstractFilter
    {
        return $this->get('core.stats.vote_remark_filter');
    }

    /**
     * @return QueryBuilder
     */
    protected function getQueryBuilder() : QueryBuilder
    {
        /** @var RemarkRepository $repo */
        $repo = $this->get('core.vote_remark_repository');

        return $repo->count('r');
    }

    /**
     * @inheritDoc
     */
    protected function getCriterias() : array
    {
        return array_merge(
            parent::getCriterias(),
            ['emotion', 'theme', 'remark', 'type', 'voter']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getGoodValueCriterias() : array
    {
        return array_merge(
            parent::getGoodValueCriterias(),
            [65432, 987654321, [4, 2], 1, 1]
        );
    }

    /**
     * @inheritDoc
     */
    protected function getBadValueCriterias() : array
    {
        return array_merge(
            parent::getBadValueCriterias(),
            ['not', 'a', 'number', 3, 'admin']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getOrderBy() : array
    {
        return array_merge(
            parent::getOrderBy(),
            ['emotion', 'theme', 'remark', 'type', 'voter']
        );
    }

    protected function getGoodValueOrderBy() : array
    {
        return array_merge(
            parent::getGoodValueOrderBy(),
            ['DESC', 'DESC', 'ASC', 'DESC', 'DESC']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getBadValueOrderBy() : array
    {
        return array_merge(
            parent::getBadValueOrderBy(),
            ['B', 'E', 'U', 'R', 'K']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getGroupBy() : array
    {
        return [
            'emotion', 'theme', 'remark', 'type', 'voter'
        ];
    }
}

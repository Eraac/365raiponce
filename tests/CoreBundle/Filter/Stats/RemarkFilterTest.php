<?php

namespace Tests\CoreBundle\Filter\Stats;

use CoreBundle\Filter\AbstractFilter;
use CoreBundle\Repository\RemarkRepository;
use Doctrine\ORM\QueryBuilder;
use Tests\CoreBundle\Filter\AbstractStatsFilterTest;

class RemarkFilterTest extends AbstractStatsFilterTest
{
    protected function getFilter() : AbstractFilter
    {
        return $this->get('core.stats.remark_filter');
    }

    /**
     * @return QueryBuilder
     */
    protected function getQueryBuilder() : QueryBuilder
    {
        /** @var RemarkRepository $repo */
        $repo = $this->get('core.remark_repository');

        return $repo->count('r');
    }

    /**
     * @inheritDoc
     */
    protected function getCriterias() : array
    {
        return array_merge(
            parent::getCriterias(),
            ['posted_before', 'posted_after', 'emotion', 'theme']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getGoodValueCriterias() : array
    {
        return array_merge(
            parent::getGoodValueCriterias(),
            [65432, 987654321, 3, [4, 2]]
        );
    }

    /**
     * @inheritDoc
     */
    protected function getBadValueCriterias() : array
    {
        return array_merge(
            parent::getBadValueCriterias(),
            ['not', 'a', 'number', 'oups']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getOrderBy() : array
    {
        return array_merge(
            parent::getOrderBy(),
            ['posted_year', 'posted_month', 'posted_day', 'emotion', 'count']
        );
    }

    protected function getGoodValueOrderBy() : array
    {
        return array_merge(
            parent::getGoodValueOrderBy(),
            ['DESC', 'DESC', 'ASC', 'DESC', 'ASC']
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
            'posted_year', 'posted_month', 'posted_day', 'emotion', 'theme'
        ];
    }
}

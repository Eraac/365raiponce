<?php

namespace Tests\CoreBundle\Filter\Stats;

use CoreBundle\Filter\AbstractFilter;
use CoreBundle\Repository\ResponseRepository;
use Doctrine\ORM\QueryBuilder;
use Tests\CoreBundle\Filter\AbstractStatsFilterTest;

class ResponseFilterTest extends AbstractStatsFilterTest
{
    /**
     * @return AbstractFilter
     */
    protected function getFilter() : AbstractFilter
    {
        return $this->get('core.stats.response_filter');
    }

    /**
     * @return QueryBuilder
     */
    protected function getQueryBuilder() : QueryBuilder
    {
        /** @var ResponseRepository $repo */
        $repo = $this->get('core.response_repository');

        return $repo->count('r');
    }

    /**
     * @inheritDoc
     */
    protected function getCriterias() : array
    {
        return array_merge(
            parent::getCriterias(),
            ['posted_before', 'posted_after', 'emotion', 'theme', 'remark', 'author']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getGoodValueCriterias() : array
    {
        return array_merge(
            parent::getGoodValueCriterias(),
            [65432, 987654321, 3, [4, 2], 1, [1, 2]]
        );
    }

    /**
     * @inheritDoc
     */
    protected function getBadValueCriterias() : array
    {
        return array_merge(
            parent::getBadValueCriterias(),
            ['not', 'a', 'number', 'oups', 'string', 'power']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getOrderBy() : array
    {
        return array_merge(
            parent::getOrderBy(),
            ['posted_year', 'posted_month', 'posted_day', 'theme', 'emotion', 'remark', 'author']
        );
    }

    protected function getGoodValueOrderBy() : array
    {
        return array_merge(
            parent::getGoodValueOrderBy(),
            ['DESC', 'DESC', 'ASC', 'DESC', 'ASC', 'ASC', 'DESC']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getBadValueOrderBy() : array
    {
        return array_merge(
            parent::getBadValueOrderBy(),
            ['B', 'E', 'U', 'R', 'K', 'K', 'O', 'K']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getGroupBy() : array
    {
        return [
            'posted_year', 'posted_month', 'posted_day', 'emotion', 'theme', 'remark', 'author'
        ];
    }
}

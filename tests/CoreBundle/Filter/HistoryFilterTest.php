<?php

namespace Tests\CoreBundle\Filter;

use CoreBundle\Filter\AbstractFilter;
use Doctrine\ORM\QueryBuilder;
use UserBundle\Repository\UserRepository;

class HistoryFilterTest extends AbstractUpdatedFilterTest
{
    protected function getFilter() : AbstractFilter
    {
        return $this->get('core.history_filter');
    }

    /**
     * @return QueryBuilder
     */
    protected function getQueryBuilder() : QueryBuilder
    {
        /** @var UserRepository $repo */
        $repo = $this->get('core.history_repository');

        return $repo->qbFindAll();
    }

    /**
     * @inheritDoc
     */
    protected function getCriterias() : array
    {
        return array_merge(
            parent::getCriterias(),
            ['is_used_for_score', 'action', 'user']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getGoodValueCriterias() : array
    {
        return array_merge(
            parent::getGoodValueCriterias(),
            ['0', [1, 2], 4]
        );
    }

    /**
     * @inheritDoc
     */
    protected function getBadValueCriterias() : array
    {
        return array_merge(
            parent::getBadValueCriterias(),
            ['not-a-number', 'yolo', 'hello']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getOrderBy() : array
    {
        return array_merge(
            parent::getOrderBy(),
            ['is_used_for_score', 'action', 'user']
        );
    }

    protected function getGoodValueOrderBy() : array
    {
        return array_merge(
            parent::getGoodValueOrderBy(),
            ['DESC', 'ASC', 'ASC']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getBadValueOrderBy() : array
    {
        return array_merge(
            parent::getBadValueOrderBy(),
            ['BURK', 'PLOP', 'BLUP']
        );
    }
}

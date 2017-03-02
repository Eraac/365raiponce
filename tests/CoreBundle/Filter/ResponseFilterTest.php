<?php

namespace Tests\CoreBundle\Filter;

use CoreBundle\Filter\AbstractFilter;
use CoreBundle\Repository\ResponseRepository;
use Doctrine\ORM\QueryBuilder;

class ResponseFilterTest extends AbstractUpdatedFilterTest
{
    protected function getFilter() : AbstractFilter
    {
        return $this->get('core.response_filter');
    }

    /**
     * @return QueryBuilder
     */
    protected function getQueryBuilder() : QueryBuilder
    {
        /** @var ResponseRepository $repo */
        $repo = $this->get('core.response_repository');

        return $repo->qbFindAllPublished();
    }

    /**
     * @inheritDoc
     */
    protected function getCriterias() : array
    {
        return array_merge(
            parent::getCriterias(),
            ['posted_before', 'posted_after', 'remark']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getGoodValueCriterias() : array
    {
        return array_merge(
            parent::getGoodValueCriterias(),
            ['876543', '234567', '1']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getBadValueCriterias() : array
    {
        return array_merge(
            parent::getBadValueCriterias(),
            ['not', 'timestamp', ['letter', 'other']]
        );
    }

    /**
     * @inheritDoc
     */
    protected function getOrderBy() : array
    {
        return array_merge(
            parent::getOrderBy(),
            ['posted_at', 'remark']
        );
    }

    protected function getGoodValueOrderBy() : array
    {
        return array_merge(
            parent::getGoodValueOrderBy(),
            ['ASC', 'DESC']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getBadValueOrderBy() : array
    {
        return array_merge(
            parent::getBadValueOrderBy(),
            ['BURK', 'KURB']
        );
    }
}

<?php

namespace Tests\CoreBundle\Filter;

use CoreBundle\Filter\AbstractFilter;
use CoreBundle\Repository\ResponseRepository;
use Doctrine\ORM\QueryBuilder;

class ReportFilterTest extends AbstractFilter
{
    protected function getFilter() : AbstractFilter
    {
        return $this->get('core.report_filter');
    }

    /**
     * @return QueryBuilder
     */
    protected function getQueryBuilder() : QueryBuilder
    {
        /** @var ResponseRepository $repo */
        $repo = $this->get('core.report_repository');

        return $repo->qbFindAll();
    }

    /**
     * @inheritDoc
     */
    protected function getCriterias() : array
    {
        return array_merge(
            parent::getCriterias(),
            ['reported_before', 'reported_after', 'response']
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
            ['reported_at', 'response']
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

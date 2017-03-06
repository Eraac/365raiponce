<?php

namespace Tests\CoreBundle\Filter;

use CoreBundle\Filter\AbstractFilter;
use CoreBundle\Repository\RemarkRepository;
use Doctrine\ORM\QueryBuilder;

class RemarkFilterTest extends AbstractUpdatedFilterTest
{
    protected function getFilter() : AbstractFilter
    {
        return $this->get('core.remark_filter');
    }

    /**
     * @return QueryBuilder
     */
    protected function getQueryBuilder() : QueryBuilder
    {
        /** @var RemarkRepository $repo */
        $repo = $this->get('core.remark_repository');

        return $repo->qbFindAllPublished();
    }

    /**
     * @inheritDoc
     */
    protected function getCriterias() : array
    {
        return array_merge(
            parent::getCriterias(),
            ['posted_before', 'posted_after', 'emotion', 'theme', 'scale_emotion']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getGoodValueCriterias() : array
    {
        return array_merge(
            parent::getGoodValueCriterias(),
            ['876543', '234567', '1', ['1', '2'], '4']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getBadValueCriterias() : array
    {
        return array_merge(
            parent::getBadValueCriterias(),
            ['not', 'timestamp', 'letter', ['not', 'number'], 'try']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getOrderBy() : array
    {
        return array_merge(
            parent::getOrderBy(),
            ['posted_at', 'emotion', 'theme', 'scale_emotion']
        );
    }

    protected function getGoodValueOrderBy() : array
    {
        return array_merge(
            parent::getGoodValueOrderBy(),
            ['ASC', 'ASC', 'DESC', 'DESC']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getBadValueOrderBy() : array
    {
        return array_merge(
            parent::getBadValueOrderBy(),
            ['BURK', 'KURB', 'DASC', 'ESC']
        );
    }
}

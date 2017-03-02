<?php

namespace Tests\CoreBundle\Filter;

use CoreBundle\Filter\AbstractFilter;
use Doctrine\ORM\QueryBuilder;
use UserBundle\Repository\UserRepository;

class EmotionFilterTest extends AbstractFilterTest
{
    protected function getFilter() : AbstractFilter
    {
        return $this->get('core.emotion_filter');
    }

    /**
     * @return QueryBuilder
     */
    protected function getQueryBuilder() : QueryBuilder
    {
        /** @var UserRepository $repo */
        $repo = $this->get('core.emotion_repository');

        return $repo->qbFindAll();
    }

    /**
     * @inheritDoc
     */
    protected function getCriterias() : array
    {
        return array_merge(
            parent::getCriterias(),
            ['name']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getGoodValueCriterias() : array
    {
        return array_merge(
            parent::getGoodValueCriterias(),
            [['hello', 'goodbye']]
        );
    }

    /**
     * @inheritDoc
     */
    protected function getBadValueCriterias() : array
    {
        return array_merge(
            parent::getBadValueCriterias(),
            ['']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getOrderBy() : array
    {
        return array_merge(
            parent::getOrderBy(),
            ['name']
        );
    }

    protected function getGoodValueOrderBy() : array
    {
        return array_merge(
            parent::getGoodValueOrderBy(),
            ['DESC']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getBadValueOrderBy() : array
    {
        return array_merge(
            parent::getBadValueOrderBy(),
            ['BURK']
        );
    }
}

<?php

namespace Tests\CoreBundle\Filter;

use CoreBundle\Exception\InvalidFilterException;
use CoreBundle\Filter\AbstractFilter;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class AbstractStatsFilterTest extends AbstractFilterTest
{
    /**
     * @return array
     */
    protected function getCriterias() : array
    {
        return [
            'created_before', 'created_after'
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getGoodValueCriterias() : array
    {
        return [
            1234, 97654321
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getBadValueCriterias() : array
    {
        return [
            'not', 'number'
        ];
    }

    /**
     * @return array
     */
    protected function getOrderBy() : array
    {
        return [
            'created_year', 'created_month', 'created_day', 'count'
        ];
    }

    protected function getGoodValueOrderBy() : array
    {
        return [
            'ASC', 'ASC', 'DESC', 'ASC'
        ];
    }

    /**
     * @return array
     */
    protected function getBadValueOrderBy() : array
    {
        return [
            'BURK', 'BURK', 'BURK', 'BURK'
        ];
    }

    /**
     * @return array
     */
    protected function getGroupBy() : array
    {
        return [
            'created_year', 'created_month', 'created_day'
        ];
    }


    public function testSuccessAllFilter()
    {
        $filter = $this->getFilter();
        $qb = $this->getQueryBuilder();

        $criterias = [];

        foreach ($this->getCriterias() as $key => $criteria) {
            $criterias[$criteria] = $this->getGoodValueCriterias()[$key];
        }

        foreach ($this->getOrderBy() as $key => $orderBy) {
            $criterias['_order'][$orderBy] = $this->getGoodValueOrderBy()[$key];
        }

        foreach ($this->getGroupBy() as $groupBy) {
            $criterias['_group'][] = $groupBy;
        }

        try {
            $qb = $filter->applyFilter($qb, $criterias);

            $qb->getQuery()->getResult();
        } catch (InvalidFilterException $e) {
            $this->assertTrue(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
}

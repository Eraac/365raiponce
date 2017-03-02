<?php

namespace CoreBundle\Repository;

use Doctrine\ORM\QueryBuilder;

abstract class AbstractPostedRepository extends AbstractDateRepository
{
    /**
     * @param QueryBuilder $qb
     * @param int|string   $timestamp
     *
     * @return QueryBuilder
     */
    public function filterByPostedBefore(QueryBuilder $qb, $timestamp) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        $qb
            ->andWhere($alias . 'postedAt < :posted_before')
            ->setParameter('posted_before', $this->dateFromTimestamp($timestamp))
        ;

        return $qb;
    }

    /**
     * @param QueryBuilder $qb
     * @param int|string   $timestamp
     *
     * @return QueryBuilder
     */
    public function filterByPostedAfter(QueryBuilder $qb, $timestamp) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        $qb
            ->andWhere($alias . 'postedAt > :posted_after')
            ->setParameter('posted_after', $this->dateFromTimestamp($timestamp))
        ;

        return $qb;
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $orderBy
     * @param string       $order
     *
     * @return QueryBuilder
     */
    public function orderByPostedYear(QueryBuilder $qb, string $orderBy, string $order) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        return $qb->orderBy('YEAR(' . $alias . 'postedAt)', $order);
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $orderBy
     * @param string       $order
     *
     * @return QueryBuilder
     */
    public function orderByPostedMonth(QueryBuilder $qb, string $orderBy, string $order) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        return $qb->orderBy('MONTH(' . $alias . 'postedAt)', $order);
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $orderBy
     * @param string       $order
     *
     * @return QueryBuilder
     */
    public function orderByPostedDay(QueryBuilder $qb, string $orderBy, string $order) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        return $qb->orderBy('DAY(' . $alias . 'postedAt)', $order);
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $groupBy
     *
     * @return QueryBuilder
     */
    public function groupByPostedYear(QueryBuilder $qb, string $groupBy) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        return $this->groupBy($qb, 'YEAR(' . $alias . 'postedAt)', 'year_posted');
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $groupBy
     *
     * @return QueryBuilder
     */
    public function groupByPostedMonth(QueryBuilder $qb, string $groupBy) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        return $this->groupBy($qb, 'MONTH(' . $alias . 'postedAt)', 'month_posted');
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $groupBy
     *
     * @return QueryBuilder
     */
    public function groupByPostedDay(QueryBuilder $qb, string $groupBy) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        return $this->groupBy($qb, 'DAY(' . $alias . 'postedAt)', 'day_posted');
    }
}

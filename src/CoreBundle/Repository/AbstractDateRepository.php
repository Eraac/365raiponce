<?php

namespace CoreBundle\Repository;

use Doctrine\ORM\QueryBuilder;

abstract class AbstractDateRepository extends AbstractRepository
{
    /**
     * @param QueryBuilder $qb
     * @param int|string   $timestamp
     *
     * @return QueryBuilder
     */
    public function filterByCreatedBefore(QueryBuilder $qb, $timestamp) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        $qb
            ->andWhere($alias . 'createdAt < :created_before')
            ->setParameter('created_before', $this->dateFromTimestamp($timestamp))
        ;

        return $qb;
    }

    /**
     * @param QueryBuilder $qb
     * @param int|string   $timestamp
     *
     * @return QueryBuilder
     */
    public function filterByCreatedAfter(QueryBuilder $qb, $timestamp) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        $qb
            ->andWhere($alias . 'createdAt > :created_after')
            ->setParameter('created_after', $this->dateFromTimestamp($timestamp))
        ;

        return $qb;
    }

    /**
     * @param QueryBuilder $qb
     * @param int|string   $timestamp
     *
     * @return QueryBuilder
     */
    public function filterByUpdatedBefore(QueryBuilder $qb, $timestamp) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        $qb
            ->andWhere($alias . 'updatedAt < :update_before')
            ->setParameter('update_before', $this->dateFromTimestamp($timestamp))
        ;

        return $qb;
    }

    /**
     * @param QueryBuilder $qb
     * @param int|string   $timestamp
     *
     * @return QueryBuilder
     */
    public function filterByUpdatedAfter(QueryBuilder $qb, $timestamp) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        $qb
            ->andWhere($alias . 'updatedAt > :update_after')
            ->setParameter('update_after', $this->dateFromTimestamp($timestamp))
        ;

        return $qb;
    }

    /**
     * @param QueryBuilder $qb
     * @param \DateTime    $from
     * @param \DateTime    $to
     *
     * @return QueryBuilder
     */
    protected function filterByPeriod(QueryBuilder $qb, \DateTime $from, \DateTime $to) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        return $qb
            ->where($alias . 'createdAt > :from', $alias . 'createdAt < :to')
            ->setParameters([
                'from' => $from,
                'to' => $to
            ])
        ;
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $orderBy
     * @param string       $order
     *
     * @return QueryBuilder
     */
    public function orderByCreatedYear(QueryBuilder $qb, string $orderBy, string $order) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        return $qb->orderBy('YEAR(' . $alias . 'createdAt)', $order);
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $orderBy
     * @param string       $order
     *
     * @return QueryBuilder
     */
    public function orderByCreatedMonth(QueryBuilder $qb, string $orderBy, string $order) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        return $qb->orderBy('MONTH(' . $alias . 'createdAt)', $order);
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $orderBy
     * @param string       $order
     *
     * @return QueryBuilder
     */
    public function orderByCreatedDay(QueryBuilder $qb, string $orderBy, string $order) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        return $qb->orderBy('DAY(' . $alias . 'createdAt)', $order);
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $groupBy
     *
     * @return QueryBuilder
     */
    public function groupByCreatedYear(QueryBuilder $qb, string $groupBy) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        $qb
            ->addSelect('YEAR(' . $alias . 'createdAt) AS year_created')
            ->addGroupBy('year_created')
        ;

        return $qb;
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $groupBy
     *
     * @return QueryBuilder
     */
    public function groupByCreatedMonth(QueryBuilder $qb, string $groupBy) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        $qb
            ->addSelect('MONTH(' . $alias . 'createdAt) AS month_created')
            ->addGroupBy('month_created')
        ;

        return $qb;
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $groupBy
     *
     * @return QueryBuilder
     */
    public function groupByCreatedDay(QueryBuilder $qb, string $groupBy) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        $qb
            ->addSelect('DAY(' . $alias . 'createdAt) AS day_created')
            ->addGroupBy('day_created')
        ;

        return $qb;
    }
}

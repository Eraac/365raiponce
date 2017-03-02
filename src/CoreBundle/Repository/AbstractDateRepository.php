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
     * @param int|string   $year
     *
     * @return QueryBuilder
     */
    public function filterByCreatedYear(QueryBuilder $qb, $year) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        if (is_array($year)) {
            $predicate = $qb->expr()->in('YEAR(' . $alias . 'createdAt)', ':year');
        } else {
            $predicate = $qb->expr()->eq('YEAR(' . $alias . 'createdAt)', ':year');
        }

        $qb
            ->andWhere($predicate)
            ->setParameter('year', $year)
        ;

        return $qb;
    }

    /**
     * @param QueryBuilder $qb
     * @param int|string   $month
     *
     * @return QueryBuilder
     */
    public function filterByCreatedMonth(QueryBuilder $qb, $month) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        if (is_array($month)) {
            $predicate = $qb->expr()->in('MONTH(' . $alias . 'createdAt)', ':month');
        } else {
            $predicate = $qb->expr()->eq('MONTH(' . $alias . 'createdAt)', ':month');
        }

        $qb
            ->andWhere($predicate)
            ->setParameter('month', $month)
        ;

        return $qb;
    }

    /**
     * @param QueryBuilder $qb
     * @param int|string   $day
     *
     * @return QueryBuilder
     */
    public function filterByCreatedDay(QueryBuilder $qb, $day) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        if (is_array($day)) {
            $predicate = $qb->expr()->in('DAY(' . $alias . 'createdAt)', ':day');
        } else {
            $predicate = $qb->expr()->eq('DAY(' . $alias . 'createdAt)', ':day');
        }

        $qb
            ->andWhere($predicate)
            ->setParameter('day', $day)
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

        return $this->groupBy($qb, 'YEAR(' . $alias . 'createdAt)', 'created_year');
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

        return $this->groupBy($qb, 'MONTH(' . $alias . 'createdAt)', 'created_month');
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

        return $this->groupBy($qb, 'DAY(' . $alias . 'createdAt)', 'created_day');
    }

    public function groupBy(QueryBuilder $qb, string $select, string $alias) : QueryBuilder
    {
        $qb
            ->addSelect($select . ' AS ' . $alias)
            ->addGroupBy($alias)
        ;

        return $qb;
    }
}

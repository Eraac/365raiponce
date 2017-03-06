<?php

namespace CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

abstract class AbstractRepository extends EntityRepository
{
    /**
     * @param QueryBuilder $qb
     *
     * @return string
     */
    public function getAlias(QueryBuilder $qb) : string
    {
        return $qb->getRootAliases()[0] . '.';
    }

    /**
     * @param QueryBuilder $qb
     * @param string|array $value
     * @param string       $x
     * @param string       $y
     *
     * @return QueryBuilder
     */
    protected function getEqOrIn(QueryBuilder $qb, $value, string $x, string $y) : QueryBuilder
    {
        if (is_array($value)) {
            $expr = $qb->expr()->in($x, ':' . $y);
        } else {
            $expr = $qb->expr()->eq($x, ':' . $y);
        }

        return $qb
            ->andWhere($expr)
            ->setParameter($y, $value);
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $attribute
     * @param string|array $value
     *
     * @return QueryBuilder
     */
    public function filterBy(QueryBuilder $qb, string $attribute, $value) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        if (is_array($value)) {
            $expr = $qb->expr()->in($alias . $attribute, ':' . $attribute);
        } else {
            $expr = $qb->expr()->like($alias . $attribute, ':' . $attribute);
            $value = '%' . $value . '%';
        }

        return $qb
            ->andWhere($expr)
            ->setParameter($attribute, $value);
    }

    /**
     * @param QueryBuilder $qb
     * @param string|array $id
     *
     * @return QueryBuilder
     */
    public function filterById(QueryBuilder $qb, $id) : QueryBuilder
    {
        $alias = $this->getAlias($qb);

        return $this->getEqOrIn($qb, $id, $alias . 'id', 'id');
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $attribute
     * @param int|array    $value
     * @param string       $aliasJoin
     * @param string       $attributeJoin
     *
     * @return QueryBuilder
     */
    public function filterByWithJoin(QueryBuilder $qb, string $attribute, $value, string $aliasJoin, string $attributeJoin = 'id') : QueryBuilder
    {
        $this->safeLeftJoin($qb, $attribute, $aliasJoin);

        return $this->getEqOrIn($qb, $value, $aliasJoin . '.' . $attributeJoin, $attribute);
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $orderBy
     * @param string       $order
     * @param string|null  $alias
     *
     * @return QueryBuilder
     */
    public function applyOrder(QueryBuilder $qb, string $orderBy, string $order, string $alias = null) : QueryBuilder
    {
        $alias = $alias ?? $this->getAlias($qb);

        return $qb->orderBy($alias . $orderBy, $order);
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $attribute
     * @param string       $aliasJoin
     * @param string       $usingAlias
     */
    protected function safeLeftJoin(QueryBuilder $qb, string $attribute, string $aliasJoin, string $usingAlias = null)
    {
        $aliases = $qb->getAllAliases();

        if (!in_array($aliasJoin, $aliases)) {
            $alias = $usingAlias ?? $this->getAlias($qb);

            $qb->leftJoin($alias . $attribute, $aliasJoin);
        }
    }

    /**
     * @param int|string $timestamp
     *
     * @return bool|\DateTime
     */
    protected function dateFromTimestamp($timestamp)
    {
        return \DateTime::createFromFormat('U', $timestamp);
    }

    /**
     * @param string $alias
     *
     * @return QueryBuilder
     */
    public function count(string $alias) : QueryBuilder
    {
        $qb = $this->createQueryBuilder($alias);

        $qb->select($qb->expr()->count($alias) . ' AS nb');
        
        return $qb;
    }

    /**
     * @param QueryBuilder $qb
     * @param string       $orderBy
     * @param string       $order
     *
     * @return QueryBuilder
     */
    public function orderByCount(QueryBuilder $qb, string $orderBy, string $order) : QueryBuilder
    {
        $alias = 'nb';

        return $this->applyOrder($qb, '', $order, $alias);
    }
}

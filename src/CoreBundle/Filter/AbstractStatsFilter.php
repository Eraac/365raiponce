<?php

namespace CoreBundle\Filter;

use CoreBundle\Exception\InvalidFilterException;
use Doctrine\ORM\QueryBuilder;

abstract class AbstractStatsFilter extends AbstractFilter
{
    const CREATED_BEFORE = 'created_before';
    const CREATED_AFTER  = 'created_after';

    const YEAR  = 'created_year';
    const MONTH = 'created_month';
    const DAY   = 'created_day';

    /**
     * @inheritdoc
     */
    protected function getMapping() : array
    {
        return array_merge(
            parent::getMapping(),
            [
                self::CREATED_BEFORE => [$this->repo, 'filterByCreatedBefore'],
                self::CREATED_AFTER  => [$this->repo, 'filterByCreatedAfter'],
                '_group'             => [$this, 'applyGroup'],
            ]
        );
    }

    /**
     * @inheritdoc
     */
    protected function getMappingValidate() : array
    {
        return array_merge(
            parent::getMappingValidate(),
            [
                self::CREATED_BEFORE => [$this, 'validateTimestamp'],
                self::CREATED_AFTER  => [$this, 'validateTimestamp'],
            ]
        );
    }

    /**
     * @inheritdoc
     */
    protected function getMappingOrderBy() : array
    {
        return [
            self::YEAR  => [$this->repo, 'orderByCreatedYear'],
            self::MONTH => [$this->repo, 'orderByCreatedMonth'],
            self::DAY   => [$this->repo, 'orderByCreatedDay'],
            'count'     => [$this->repo, 'orderByCount'],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getMappingGroupBy() : array
    {
        return [
            self::YEAR  => [$this->repo, 'groupByCreatedYear'],
            self::MONTH => [$this->repo, 'groupByCreatedMonth'],
            self::DAY   => [$this->repo, 'groupByCreatedDay'],
        ];
    }

    /**
     * @param QueryBuilder  $qb
     * @param string|array  $groupsBy
     *
     * @return QueryBuilder
     */
    protected function applyGroup(QueryBuilder $qb, $groupsBy) : QueryBuilder
    {
        $mappingGroupsBy = $this->getMappingGroupBy();

        if (!is_array($groupsBy)) {
            $groupsBy = [$groupsBy];
        }

        foreach ($groupsBy as $groupBy) {

            $method = isset($mappingGroupsBy[$groupBy]) ? $mappingGroupsBy[$groupBy] : null;
            
            if (is_null($method)) {
                throw new InvalidFilterException(
                    $this->t('core.error.invalid_group_by', ['%group_by%' => $groupBy])
                );
            }

            assert(is_callable($method), new \LogicException(
                sprintf('method for group by %s doesn\'t exist !', $groupBy)
            ));

            call_user_func_array($method, [$qb, $groupBy]);
        }

        return $qb;
    }
}

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
     * @return array
     */
    protected function getDefaultFilters() : array
    {
        return [];
    }

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
                self::YEAR           => [$this->repo, 'filterByCreatedYear'],
                self::MONTH          => [$this->repo, 'filterByCreatedMonth'],
                self::DAY            => [$this->repo, 'filterByCreatedDay'],
                '_group'             => [$this, 'applyGroup'],
            ]
        );
    }

    /**
     * @inheritdoc
     */
    protected function getMappingValidate() : array
    {
        return [
            self::CREATED_BEFORE => [$this, 'validateTimestamp'],
            self::CREATED_AFTER  => [$this, 'validateTimestamp'],
            self::YEAR           => [$this, 'validateNumber'],
            self::MONTH          => [$this, 'validateNumber'],
            self::DAY            => [$this, 'validateNumber'],
        ];
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
     * @inheritdoc
     */
    public function applyFilter(QueryBuilder $qb, array $criterias) : QueryBuilder
    {
        $this->validateOrderBy($criterias);

        return parent::applyFilter($qb, $criterias);
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

        $groupsBy = array_unique($groupsBy);

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

    /**
     * @param array $criterias
     *
     * @throws InvalidFilterException
     */
    private function validateOrderBy(array $criterias)
    {
        $orders = $criterias['_order'] ?? [];
        $groups = $criterias['_group'] ?? [];

        unset($orders['count']);

        if (!is_array($groups)) {
            $groups = [$groups];
        }

        $diffs = array_diff(array_keys($orders), $groups);

        if (!empty($diffs)) {
            throw new InvalidFilterException(
                $this->t('core.error.miss_group_by', ['%fields%' => implode(', ', $diffs)])
            );
        }
    }
}

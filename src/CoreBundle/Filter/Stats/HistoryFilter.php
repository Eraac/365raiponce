<?php

namespace CoreBundle\Filter\Stats;

use CoreBundle\Filter\AbstractStatsFilter;

class HistoryFilter extends AbstractStatsFilter
{
    /**
     * @inheritdoc
     */
    protected function getMapping() : array
    {
        return array_merge(
            parent::getMapping(),
            [
                'user'              => [$this->repo, 'filterByUser'],
                'action'            => [$this->repo, 'filterByAction'],
                'is_used_for_score' => [$this->repo, 'filterByIsUsedForScore'],
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
                'user'              => [$this, 'validateNumber'],
                'action'            => [$this, 'validateNumber'],
                'is_used_for_score' => [$this, 'validateBoolean'],
            ]
        );
    }

    /**
     * @inheritdoc
     */
    protected function getMappingOrderBy() : array
    {
        return array_merge(
            parent::getMappingOrderBy(),
            [
                'user'              => [$this->repo, self::DEFAULT_METHOD_ORDER],
                'action'            => [$this->repo, self::DEFAULT_METHOD_ORDER],
                'is_used_for_score' => [$this->repo, 'orderByIsUsedForScore'],
            ]
        );
    }

    /**
     * @inheritdoc
     */
    protected function getMappingGroupBy() : array
    {
        return array_merge(
            parent::getMappingGroupBy(),
            [
                'user'           => [$this->repo, 'groupByUser'],
                'action'         => [$this->repo, 'groupByAction'],
                'is_used_for_score' => [$this->repo, 'groupByIsUsedForScore'],
            ]
        );
    }
}

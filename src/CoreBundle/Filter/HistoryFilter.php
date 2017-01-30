<?php

namespace CoreBundle\Filter;

class HistoryFilter extends AbstractUpdatedFilter
{
    /**
     * @inheritdoc
     */
    protected function getMapping() : array
    {
        return array_merge(
            parent::getMapping(),
            [
                'is_used_for_score' => [$this->repo, 'filterByIsUsedForScore'],
                'action' => [$this->repo, 'filterByAction'],
                'user' => [$this->repo, 'filterByUser'],
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
                'is_used_for_score' => [$this, 'validateBoolean'],
                'action' => [$this, 'validateNumber'],
                'user' => [$this, 'validateNumber'],
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
                'is_used_for_score' => [$this->repo, 'orderByIsUsedForScore'],
                'action' => [$this->repo, self::DEFAULT_METHOD_ORDER],
                'user' => [$this->repo, 'orderByUser'],
            ]
        );
    }
}

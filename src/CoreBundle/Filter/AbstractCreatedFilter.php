<?php

namespace CoreBundle\Filter;

abstract class AbstractCreatedFilter extends AbstractFilter
{
    const UPDATED_BEFORE = 'created_before';
    const UPDATED_AFTER  = 'created_after';

    /**
     * @inheritdoc
     */
    protected function getMapping() : array
    {
        return array_merge(
            parent::getMapping(),
            [
                self::UPDATED_BEFORE => [$this->repo, 'filterByCreatedBefore'],
                self::UPDATED_AFTER  => [$this->repo, 'filterByCreatedAfter'],
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
                self::UPDATED_BEFORE => [$this, 'validateTimestamp'],
                self::UPDATED_AFTER  => [$this, 'validateTimestamp'],
            ]
        );
    }
}

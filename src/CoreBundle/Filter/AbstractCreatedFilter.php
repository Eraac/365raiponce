<?php

namespace CoreBundle\Filter;

abstract class AbstractCreatedFilter extends AbstractFilter
{
    const CREATED_BEFORE = 'created_before';
    const CREATED_AFTER  = 'created_after';

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
}

<?php

namespace CoreBundle\Filter;

class ThemeFilter extends AbstractFilter
{
    /**
     * @inheritdoc
     */
    protected function getMapping() : array
    {
        return array_merge(
            parent::getMapping(),
            [
                'name'  => [$this->repo, 'filterByName'],
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
                'name'  => [$this->repo, self::DEFAULT_METHOD_ORDER],
            ]
        );
    }
}

<?php

namespace CoreBundle\Filter;

class GradeFilter extends AbstractFilter
{
    /**
     * @inheritdoc
     */
    protected function getMapping() : array
    {
        return array_merge(
            parent::getMapping(),
            [
                'name' => [$this->repo, 'filterByName'],
                'score_min' => [$this->repo, 'filterByScoreMin'],
                'score_max' => [$this->repo, 'filterByScoreMax'],
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
                'score_min' => [$this, 'validateNumber'],
                'score_max' => [$this, 'validateNumber'],
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
                'score' => [$this->repo, self::DEFAULT_METHOD_ORDER],
            ]
        );
    }
}

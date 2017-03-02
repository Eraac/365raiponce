<?php

namespace CoreBundle\Filter;

class ReportFilter extends AbstractUpdatedFilter
{
    const REPORTED_BEFORE = 'reported_before';
    const REPORTED_AFTER  = 'reported_after';

    /**
     * @inheritdoc
     */
    protected function getMapping() : array
    {
        return array_merge(
            parent::getMapping(),
            [
                self::REPORTED_BEFORE => [$this->repo, 'filterByReportedBefore'],
                self::REPORTED_AFTER  => [$this->repo, 'filterByReportedAfter'],
                'response'            => [$this->repo, 'filterByResponse'],
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
                self::REPORTED_BEFORE => [$this, 'validateTimestamp'],
                self::REPORTED_AFTER  => [$this, 'validateTimestamp'],
                'response'            => [$this, 'validateNumber'],
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
                'reported_at' => [$this->repo, 'orderByReportedAt'],
                'response'    => [$this->repo, 'orderByResponse'],
            ]
        );
    }
}

<?php

namespace CoreBundle\Filter;

class NewsFilter extends AbstractUpdatedFilter
{
    const STARTED_BEFORE = 'started_before';
    const STARTED_AFTER  = 'started_after';
    const ENDED_BEFORE   = 'ended_before';
    const ENDED_AFTER    = 'ended_after';

    /**
     * @inheritdoc
     */
    protected function getMapping() : array
    {
        return array_merge(
            parent::getMapping(),
            [
                self::STARTED_BEFORE => [$this->repo, 'filterByStartedBefore'],
                self::STARTED_AFTER  => [$this->repo, 'filterByStartedAfter'],
                self::ENDED_BEFORE   => [$this->repo, 'filterByEndedBefore'],
                self::ENDED_AFTER    => [$this->repo, 'filterByEndedAfter'],
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
                self::STARTED_BEFORE => [$this, 'validateTimestamp'],
                self::STARTED_AFTER  => [$this, 'validateTimestamp'],
                self::ENDED_BEFORE   => [$this, 'validateTimestamp'],
                self::ENDED_AFTER    => [$this, 'validateTimestamp'],
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
                'start_at' => [$this->repo, 'orderByStartAt'],
                'end_at'   => [$this->repo, 'orderByEndAt'],
            ]
        );
    }
}

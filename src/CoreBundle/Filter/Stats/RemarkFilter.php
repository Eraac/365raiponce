<?php

namespace CoreBundle\Filter\Stats;

use CoreBundle\Filter\AbstractStatsFilter;

class RemarkFilter extends AbstractStatsFilter
{
    const POSTED_BEFORE = 'posted_before';
    const POSTED_AFTER  = 'posted_after';

    const POSTED_YEAR  = 'posted_year';
    const POSTED_MONTH = 'posted_month';
    const POSTED_DAY   = 'posted_day';

    /**
     * @inheritdoc
     */
    protected function getMapping() : array
    {
        return array_merge(
            parent::getMapping(),
            [
                self::POSTED_BEFORE => [$this->repo, 'filterByPostedBefore'],
                self::POSTED_AFTER  => [$this->repo, 'filterByPostedAfter'],
                'emotion'   => [$this->repo, 'filterByEmotion'],
                'theme'     => [$this->repo, 'filterByTheme'],
                'scale_emotion' => [$this->repo, 'filterByScaleEmotion'],
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
                self::POSTED_BEFORE => [$this, 'validateTimestamp'],
                self::POSTED_AFTER  => [$this, 'validateTimestamp'],
                'emotion'       => [$this, 'validateNumber'],
                'theme'         => [$this, 'validateNumber'],
                'scale_emotion' => [$this, 'validateNumber'],
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
                self::POSTED_YEAR  => [$this->repo, 'orderByPostedYear'],
                self::POSTED_MONTH => [$this->repo, 'orderByPostedMonth'],
                self::POSTED_DAY   => [$this->repo, 'orderByPostedDay'],
                'emotion'       => [$this->repo, 'orderByEmotion'],
                'theme'         => [$this->repo, 'orderByTheme'],
                'scale_emotion' => [$this->repo, 'orderByScaleEmotion'],
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
                self::POSTED_YEAR  => [$this->repo, 'groupByPostedYear'],
                self::POSTED_MONTH => [$this->repo, 'groupByPostedMonth'],
                self::POSTED_DAY   => [$this->repo, 'groupByPostedDay'],
                'emotion'   => [$this->repo, 'groupByEmotion'],
                'theme'     => [$this->repo, 'groupByTheme'],
                'scale_emotion' => [$this->repo, 'groupByScaleEmotion'],
            ]
        );
    }
}

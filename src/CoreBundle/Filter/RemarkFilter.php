<?php

namespace CoreBundle\Filter;

class RemarkFilter extends AbstractUpdatedFilter
{
    const POSTED_BEFORE = 'posted_before';
    const POSTED_AFTER  = 'posted_after';

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
                'emotion'       => [$this->repo, 'filterByEmotion'],
                'theme'         => [$this->repo, 'filterByTheme'],
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
                'posted_at' => [$this->repo, 'orderByPostedAt'],
                'emotion' => [$this->repo, 'orderByEmotion'],
                'theme' => [$this->repo, 'orderByTheme'],
                'scale_emotion' => [$this->repo, 'orderByScaleEmotion'],
            ]
        );
    }
}

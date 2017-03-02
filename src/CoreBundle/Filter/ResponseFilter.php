<?php

namespace CoreBundle\Filter;

class ResponseFilter extends AbstractUpdatedFilter
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
                'remark'            => [$this->repo, 'filterByRemark'],
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
                'remark'            => [$this, 'validateNumber'],
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
                'remark'    => [$this->repo, 'orderByRemark'],
            ]
        );
    }
}

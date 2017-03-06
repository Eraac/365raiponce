<?php

namespace CoreBundle\Filter\Stats;

use CoreBundle\Entity\VoteRemark;
use CoreBundle\Exception\InvalidFilterException;
use CoreBundle\Filter\AbstractStatsFilter;

class VoteRemarkFilter extends AbstractStatsFilter
{
    /**
     * @inheritdoc
     */
    protected function getMapping() : array
    {
        return array_merge(
            parent::getMapping(),
            [
                'emotion'       => [$this->repo, 'filterByEmotion'],
                'theme'         => [$this->repo, 'filterByTheme'],
                'remark'        => [$this->repo, 'filterByRemark'],
                'type'          => [$this->repo, 'filterByType'],
                'voter'         => [$this->repo, 'filterByVoter'],
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
                'emotion'       => [$this, 'validateNumber'],
                'theme'         => [$this, 'validateNumber'],
                'remark'        => [$this, 'validateNumber'],
                'type'          => [$this, 'validateType'],
                'voter'         => [$this, 'validateNumber'],
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
                'emotion'       => [$this->repo, 'orderByEmotion'],
                'theme'         => [$this->repo, 'orderByTheme'],
                'remark'        => [$this->repo, 'applyOrder'],
                'type'          => [$this->repo, 'applyOrder'],
                'voter'         => [$this->repo, 'orderByVoter'],
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
                'emotion'       => [$this->repo, 'groupByEmotion'],
                'theme'         => [$this->repo, 'groupByTheme'],
                'voter'         => [$this->repo, 'groupByVoter'],
                'type'          => [$this->repo, 'groupByType'],
                'remark'        => [$this->repo, 'groupByRemark'],
                'scale_emotion' => [$this->repo, 'groupByScaleEmotion'],
            ]
        );
    }

    /**
     * @param integer $type
     * @param string $error
     *
     * @throws InvalidFilterException
     */
    protected function validateType($type, string $error = 'core.error.filter.type')
    {
        if (!in_array($type, VoteRemark::TYPES)) {
            throw new InvalidFilterException(
                $this->t($error, ['%type%' => $type])
            );
        }
    }
}

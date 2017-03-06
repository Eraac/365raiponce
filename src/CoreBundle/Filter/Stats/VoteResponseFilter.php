<?php

namespace CoreBundle\Filter\Stats;

use CoreBundle\Filter\AbstractStatsFilter;

class VoteResponseFilter extends AbstractStatsFilter
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
                'response'      => [$this->repo, 'filterByResponse'],
                'voter'         => [$this->repo, 'filterByVoter'],
                'receiver'      => [$this->repo, 'filterByReceiver'],
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
                'response'      => [$this, 'validateNumber'],
                'voter'         => [$this, 'validateNumber'],
                'receiver'      => [$this, 'validateNumber'],
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
                'remark'        => [$this->repo, 'orderByRemark'],
                'response'      => [$this->repo, 'applyOrder'],
                'voter'         => [$this->repo, 'orderByVoter'],
                'receiver'      => [$this->repo, 'orderByReceiver'],
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
                'receiver'      => [$this->repo, 'groupByReceiver'],
                'remark'        => [$this->repo, 'groupByRemark'],
                'response'      => [$this->repo, 'groupByResponse'],
                'scale_emotion' => [$this->repo, 'groupByScaleEmotion'],
            ]
        );
    }
}

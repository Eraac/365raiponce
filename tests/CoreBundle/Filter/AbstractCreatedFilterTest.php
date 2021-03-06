<?php

namespace Tests\CoreBundle\Filter;

abstract class AbstractCreatedFilterTest extends AbstractFilterTest
{
    /**
     * @inheritDoc
     */
    protected function getCriterias() : array
    {
        return array_merge(
            parent::getCriterias(),
            ['created_before', 'created_after']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getGoodValueCriterias() : array
    {
        return array_merge(
            parent::getGoodValueCriterias(),
            ['10000', '1477902562']
        );
    }

    /**
     * @inheritDoc
     */
    protected function getBadValueCriterias() : array
    {
        return array_merge(
            parent::getBadValueCriterias(),
            ['not-a-number', 'burk-number']
        );
    }
}

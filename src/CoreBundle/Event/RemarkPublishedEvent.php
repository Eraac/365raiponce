<?php

namespace CoreBundle\Event;

use CoreBundle\Entity\Remark;
use Symfony\Component\EventDispatcher\Event;

class RemarkPublishedEvent extends Event
{
    const NAME = 'core.published.remark';

    /**
     * @var Remark
     */
    protected $remark;


    /**
     * RemarkPublishedEvent constructor.
     *
     * @param Remark $remark
     */
    public function __construct(Remark $remark)
    {
        $this->remark = $remark;
    }

    public function getRemark() : Remark
    {
        return $this->remark;
    }
}

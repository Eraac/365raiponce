<?php

namespace CoreBundle\EventListener\Doctrine;

use CoreBundle\Entity\Remark;
use CoreBundle\Event\Dispatcher\DelayedEventDispatcher;
use CoreBundle\Event\RemarkPublishedEvent;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class RemarkListener
{
    /**
     * @var DelayedEventDispatcher
     */
    private $dispatcher;


    /**
     * RemarkListener constructor.
     *
     * @param DelayedEventDispatcher $dispatcher
     */
    public function __construct(DelayedEventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param Remark             $remark
     * @param PreUpdateEventArgs $event
     */
    public function preUpdateHandler(Remark $remark, PreUpdateEventArgs $event)
    {
        if (is_null($event->getOldValue('postedAt'))) {
            /** @var Remark $remark */
            $remark = $event->getObject();

            $this->dispatcher->dispatch(RemarkPublishedEvent::NAME, new RemarkPublishedEvent($remark));
        }
    }
}

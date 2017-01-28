<?php

namespace CoreBundle\EventListener\Doctrine;

use CoreBundle\Entity\AbstractVote;
use CoreBundle\Event\NewVoteEvent;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class VoteListener
{
    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;


    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param AbstractVote $vote
     * @param LifecycleEventArgs $event
     */
    public function prePersistHandler(AbstractVote $vote, LifecycleEventArgs $event)
    {
        $event = new NewVoteEvent($vote);

        $this->dispatcher->dispatch(NewVoteEvent::NAME, $event);
    }
}

<?php

namespace CoreBundle\EventListener\Doctrine;

use CoreBundle\Entity\AbstractVote;
use CoreBundle\Entity\VoteRemark;
use CoreBundle\Event\NewVoteEvent;
use CoreBundle\Service\KeyBuilder;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Predis\Client;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class VoteListener
{
    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * @var Client
     */
    private $redis;


    /**
     * VoteListener constructor.
     *
     * @param EventDispatcherInterface $dispatcher
     * @param Client                   $redis
     */
    public function __construct(EventDispatcherInterface $dispatcher, Client $redis)
    {
        $this->dispatcher = $dispatcher;
        $this->redis = $redis;
    }

    /**
     * @param AbstractVote $vote
     * @param LifecycleEventArgs $event
     */
    public function prePersistHandler(AbstractVote $vote, LifecycleEventArgs $event)
    {
        $event = new NewVoteEvent($vote);

        $this->dispatcher->dispatch(NewVoteEvent::NAME, $event);

        $this->invalideCache($vote);
    }

    /**
     * @param AbstractVote $vote
     * @param LifecycleEventArgs $event
     */
    public function preRemoveHandler(AbstractVote $vote, LifecycleEventArgs $event)
    {
        $this->invalideCache($vote);
    }

    /**
     * @param AbstractVote $vote
     */
    private function invalideCache(AbstractVote $vote)
    {
        $key = $vote instanceof VoteRemark ?
            KeyBuilder::keyCountVoteForRemark($vote->getRemark(), $vote->getType()) :
            KeyBuilder::keyCountVoteForResponse($vote->getResponse());

        $this->redis->del($key);
    }
}

<?php

namespace CoreBundle\EventListener\Doctrine;

use CoreBundle\Entity\AbstractVote;
use CoreBundle\Entity\VoteRemark;
use CoreBundle\Event\NewVoteEvent;
use CoreBundle\Service\KeyBuilder;
use Doctrine\Common\Cache\PredisCache;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class VoteListener
{
    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * @var PredisCache
     */
    private $client;


    /**
     * VoteListener constructor.
     *
     * @param EventDispatcherInterface $dispatcher
     * @param PredisCache              $client
     */
    public function __construct(EventDispatcherInterface $dispatcher, PredisCache $client)
    {
        $this->dispatcher = $dispatcher;
        $this->client = $client;
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
        $keyCount = $vote instanceof VoteRemark ?
            KeyBuilder::keyCountVoteForRemark($vote->getRemark(), $vote->getType()) :
            KeyBuilder::keyCountVoteForResponse($vote->getResponse());

        $keyHasVote = $vote instanceof VoteRemark ?
            KeyBuilder::keyUserHasVoteForRemark($vote->getRemark(), $vote->getUser(), $vote->getType()) :
            KeyBuilder::keyUserHasVoteForResponse($vote->getResponse(), $vote->getUser());

        $this->client->delete($keyCount);
        $this->client->delete($keyHasVote);
    }
}

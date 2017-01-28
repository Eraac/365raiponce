<?php

namespace CoreBundle\EventListener;

use CoreBundle\Entity\{Action, VoteResponse};
use CoreBundle\Event\Dispatcher\DelayedEventDispatcher;
use CoreBundle\Event\History\{HistoryGiveVoteEvent, HistoryReceiveVoteEvent, HistoryResponsePublishedEvent, HistoryResponseUnpublishedEvent};
use CoreBundle\Event\{NewVoteEvent, ResponsePublishedEvent, ResponseUnpublishedEvent};

class ActionListener
{
    /**
     * @var DelayedEventDispatcher
     */
    private $dispatcher;


    public function __construct(DelayedEventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param ResponsePublishedEvent $event
     */
    public function onResponsePublished(ResponsePublishedEvent $event)
    {
        $event = new HistoryResponsePublishedEvent(Action::PUBLISH_RESPONSE, $event->getResponse());

        $this->dispatcher->dispatch(HistoryResponsePublishedEvent::NAME, $event);
    }

    /**
     * @param ResponseUnpublishedEvent $event
     */
    public function onResponseUnpublished(ResponseUnpublishedEvent $event)
    {
        $event = new HistoryResponseUnpublishedEvent($event->getResponse());

        $this->dispatcher->dispatch(HistoryResponseUnpublishedEvent::NAME, $event);
    }

    /**
     * @param NewVoteEvent $event
     */
    public function onNewVote(NewVoteEvent $event)
    {
        $vote = $event->getVote();

        $event = new HistoryGiveVoteEvent(Action::GIVE_VOTE, $vote);

        $this->dispatcher->dispatch(HistoryGiveVoteEvent::NAME, $event);

        if ($vote instanceof VoteResponse) {
            $event = new HistoryReceiveVoteEvent(Action::RECEIVE_VOTE, $vote);

            $this->dispatcher->dispatch(HistoryReceiveVoteEvent::NAME, $event);
        }
    }
}

<?php

namespace CoreBundle\EventListener;

use CoreBundle\Entity\{
    Action, History, VoteRemark, VoteResponse
};
use CoreBundle\Event\History\{
    HistoryGiveVoteEvent, HistoryReceiveVoteEvent, HistoryResponsePublishedEvent, HistoryResponseUnpublishedEvent, HistoryShareRemarkEvent
};
use CoreBundle\Repository\HistoryRepository;
use Doctrine\ORM\EntityManager;

class HistoryListener
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * @var boolean
     */
    private $isEnable;

    /**
     * HistoryListener constructor.
     *
     * @param EntityManager $em
     * @param boolean       $isEnable
     */
    public function __construct(EntityManager $em, bool $isEnable)
    {
        $this->em = $em;
        $this->isEnable = $isEnable;
    }

    /**
     * @param HistoryResponsePublishedEvent $event
     */
    public function onResponsePublished(HistoryResponsePublishedEvent $event)
    {
        if (!$this->isEnable) {
            return;
        }

        $response = $event->getResponse();
        $author = $response->getAuthor();
        $action = $this->getActionByName($event->getActionName());

        $history = new History\HistoryResponsePublished();

        $history
            ->setResponse($response)
            ->setUser($author)
            ->setAction($action)
        ;

        $this->persistHistory($history);
    }

    /**
     * @param HistoryResponseUnpublishedEvent $event
     */
    public function onResponseUnpublished(HistoryResponseUnpublishedEvent $event)
    {
        if (!$this->isEnable) {
            return;
        }

        /** @var HistoryRepository $repo */
        $repo = $this->em->getRepository('CoreBundle:History\HistoryResponsePublished');

        $histories = $repo->findBy([
            'user' => $event->getResponse()->getAuthor(),
            'response' => $event->getResponse()
        ]);

        foreach ($histories as $history) {
            $this->em->remove($history);
        }

        $this->em->flush();
    }

    /**
     * @param HistoryGiveVoteEvent $event
     */
    public function onGiveVote(HistoryGiveVoteEvent $event)
    {
        if (!$this->isEnable) {
            return;
        }

        $vote = $event->getVote();
        $user = $vote->getUser();
        $action = $this->getActionByName($event->getActionName());

        if ($vote instanceof VoteRemark) {
            $history = new History\HistoryVoteRemark();
        } else if ($vote instanceof VoteResponse) {
            $history = new History\HistoryVoteResponse();
        }

        if (isset($history)) {
            $history
                ->setVote($vote)
                ->setUser($user)
                ->setAction($action)
            ;

            $this->persistHistory($history);
        }
    }

    /**
     * @param HistoryReceiveVoteEvent $event
     */
    public function onReceiveVote(HistoryReceiveVoteEvent $event)
    {
        if (!$this->isEnable) {
            return;
        }

        /** @var VoteResponse $vote */
        $vote = $event->getVote();
        $user = $vote->getResponse()->getAuthor();
        $action = $this->getActionByName($event->getActionName());

        $history = new History\HistoryReceiveVote();

        $history
            ->setVote($vote)
            ->setUser($user)
            ->setAction($action)
        ;

        $this->persistHistory($history);
    }

    /**
     * @param HistoryShareRemarkEvent $event
     */
    public function onShareRemark(HistoryShareRemarkEvent $event)
    {
        if (!$this->isEnable) {
            return;
        }

        $user = $event->getUser();
        $action = $this->getActionByName($event->getActionName());

        $history = new History\HistoryShareRemark();

        $history
            ->setRemark($event->getRemark())
            ->setAction($action)
            ->setUser($user)
        ;

        $this->persistHistory($history);
    }

    /**
     * @param History $history
     */
    private function persistHistory(History $history)
    {
        $this->em->persist($history);
        $this->em->flush();
    }

    /**
     * @param string $name
     *
     * @return Action
     */
    private function getActionByName(string $name) : Action
    {
        $repo = $this->em->getRepository('CoreBundle:Action');

        return $repo->findOneBy(['eventName' => $name]);
    }
}

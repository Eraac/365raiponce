<?php

namespace CoreBundle\Command;

use CoreBundle\Entity\History\HistoryReceiveVote;
use CoreBundle\Entity\History\HistoryResponsePublished;
use CoreBundle\Entity\History\HistoryVoteRemark;
use CoreBundle\Entity\History\HistoryVoteResponse;
use CoreBundle\Entity\Response;
use CoreBundle\Entity\VoteRemark;
use CoreBundle\Entity\VoteResponse;
use CoreBundle\Repository\ActionRepository;
use CoreBundle\Repository\ResponseRepository;
use CoreBundle\Repository\VoteRemarkRepository;
use CoreBundle\Repository\VoteResponseRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BuildHistoryCommand extends ContainerAwareCommand
{
    private static $actions = [];

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('core:history:build')
            ->setDescription('Build history')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var EntityManager $em */
        $this->em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $this->loadAction();
        $this->historyResponse();
        $this->historyVoteRemark();
        $this->historyVoteResponse();

        $this->em->flush();
    }

    /**
     * Load all actions (for optimisation)
     */
    private function loadAction()
    {
        /** @var ActionRepository $actionRepo */
        $actionRepo = $this->getContainer()->get('core.action_repository');

        self::$actions = [
            'publish_response'  => $actionRepo->findOneBy(['eventName' => 'publish_response']),
            'give_vote'         => $actionRepo->findOneBy(['eventName' => 'give_vote']),
            'receive_vote'      => $actionRepo->findOneBy(['eventName' => 'receive_vote']),
        ];
    }

    /**
     * Create history for the response
     */
    private function historyResponse()
    {
        /** @var ResponseRepository $responseRepo */
        $responseRepo = $this->getContainer()->get('core.response_repository');

        $responses = $responseRepo->qbFindAllPublished()->getQuery()->getResult();

        $count = 0;

        /** @var Response $response */
        foreach ($responses as $response) {
            $history = new HistoryResponsePublished();

            $history
                ->setResponse($response)
                ->setCreatedAt($response->getPostedAt())
                ->setUser($response->getAuthor())
                ->setAction(self::$actions['publish_response'])
            ;

            $this->em->persist($history);

            $count++;

            if ($count > 50) {
                $this->em->flush();
                $this->em->clear('CoreBundle:History\HistoryResponsePublished');
                $count = 0;
            }
        }

        $this->em->flush();
        $this->em->clear('CoreBundle:History\HistoryResponsePublished');
    }

    /**
     * Create history for all votes on remark
     */
    private function historyVoteRemark()
    {
        /** @var VoteRemarkRepository $voteRemarkRepo */
        $voteRemarkRepo = $this->getContainer()->get('core.vote_remark_repository');

        $votes = $voteRemarkRepo->findAll();

        $count = 0;

        /** @var VoteRemark $vote */
        foreach ($votes as $vote) {
            $history = new HistoryVoteRemark();

            $history
                ->setVote($vote)
                ->setCreatedAt($vote->getCreatedAt())
                ->setUser($vote->getUser())
                ->setAction(self::$actions['give_vote'])
            ;

            $this->em->persist($history);

            if ($count > 50) {
                $this->em->flush();
                $this->em->clear('CoreBundle:VoteRemark');
                $count = 0;
            }
        }

        $this->em->flush();
        $this->em->clear('CoreBundle:VoteRemark');
    }

    /**
     * Create history for all votes on response
     */
    private function historyVoteResponse()
    {
        /** @var VoteResponseRepository $voteRemarkRepo */
        $voteResponseRepo = $this->getContainer()->get('core.vote_response_repository');

        $votes = $voteResponseRepo->findAll();

        $count = 0;

        /** @var VoteResponse $vote */
        foreach ($votes as $vote) {
            $historyGive = new HistoryVoteResponse();

            $historyGive
                ->setVote($vote)
                ->setCreatedAt($vote->getCreatedAt())
                ->setUser($vote->getUser())
                ->setAction(self::$actions['give_vote'])
            ;

            $historyReceive = new HistoryReceiveVote();

            $historyReceive
                ->setVote($vote)
                ->setCreatedAt($vote->getCreatedAt())
                ->setUser($vote->getResponse()->getAuthor())
                ->setAction(self::$actions['receive_vote'])
            ;

            $this->em->persist($historyGive);
            $this->em->persist($historyReceive);

            if ($count > 25) {
                $this->em->flush();
                $this->em->clear('CoreBundle:VoteResponse');
                $count = 0;
            }
        }

        $this->em->flush();
        $this->em->clear('CoreBundle:VoteResponse');
    }
}

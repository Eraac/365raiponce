<?php

namespace CoreBundle\EventListener\Serialization;

use CoreBundle\Entity\Remark;
use CoreBundle\Entity\VoteRemark;
use CoreBundle\Repository\ResponseRepository;
use CoreBundle\Repository\VoteRemarkRepository;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use UserBundle\Entity\User;

class RemarkListener implements EventSubscriberInterface
{
    /**
     * @var TokenStorageInterface
     */
    private $token;

    /**
     * @var VoteRemarkRepository
     */
    private $voteRepository;

    /**
     * @var ResponseRepository
     */
    private $responseRepository;


    /**
     * ResponseListener constructor.
     *
     * @param TokenStorageInterface $token
     * @param VoteRemarkRepository  $voteRepository
     * @param ResponseRepository    $responseRepository
     */
    public function __construct(TokenStorageInterface $token, VoteRemarkRepository $voteRepository, ResponseRepository $responseRepository)
    {
        $this->token = $token;
        $this->voteRepository = $voteRepository;
        $this->responseRepository = $responseRepository;
    }

    /**
     * @param ObjectEvent $event
     */
    public function onPreSerialize(ObjectEvent $event)
    {
        /** @var Remark $remark */
        $remark = $event->getObject();

        /** @var User|null $user */
        $user = $this->token->getToken()->getUser();

        if ($user instanceof User) {
            $remark->setUserHasVote(
                $this->voteRepository->userHasVoteFor($remark, $user, VoteRemark::IS_SEXIST),
                $this->voteRepository->userHasVoteFor($remark, $user, VoteRemark::ALREADY_LIVED)
            );
        }

        $groups = $event->getContext()->attributes->get('groups')->get();

        if (in_array('stats', $groups)) {
            $remark->setCountResponses(
                $this->responseRepository->countResponsePublishedForRemark($remark),
                $this->responseRepository->countResponseUnpublishedForRemark($remark)
            );

            $remark->setCountVotes(
                $this->voteRepository->countVoteForRemark($remark, VoteRemark::IS_SEXIST),
                $this->voteRepository->countVoteForRemark($remark, VoteRemark::ALREADY_LIVED)
            );
        }
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents() : array
    {
        return [
            [
                'event' => 'serializer.pre_serialize', 'class' => Remark::class, 'method' => 'onPreSerialize'
            ],
        ];
    }
}

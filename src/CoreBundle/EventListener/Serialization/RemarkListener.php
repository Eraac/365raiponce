<?php

namespace CoreBundle\EventListener\Serialization;

use CoreBundle\Entity\Remark;
use CoreBundle\Entity\VoteRemark;
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
    private $repository;

    /**
     * ResponseListener constructor.
     *
     * @param TokenStorageInterface $token
     * @param VoteRemarkRepository $repository
     */
    public function __construct(TokenStorageInterface $token, VoteRemarkRepository $repository)
    {
        $this->token = $token;
        $this->repository = $repository;
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
                $this->repository->userHasVoteFor($remark, $user, VoteRemark::IS_SEXIST),
                $this->repository->userHasVoteFor($remark, $user, VoteRemark::ALREADY_LIVED)
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

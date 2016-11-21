<?php

namespace CoreBundle\EventListener\Serialization;

use CoreBundle\Entity\Response;
use CoreBundle\Repository\VoteResponseRepository;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use UserBundle\Entity\User;

class ResponseListener implements EventSubscriberInterface
{
    /**
     * @var TokenStorageInterface
     */
    private $token;

    /**
     * @var VoteResponseRepository
     */
    private $repository;

    /**
     * ResponseListener constructor.
     *
     * @param TokenStorageInterface $token
     * @param VoteResponseRepository $repository
     */
    public function __construct(TokenStorageInterface $token, VoteResponseRepository $repository)
    {
        $this->token = $token;
        $this->repository = $repository;
    }

    /**
     * @param ObjectEvent $event
     */
    public function onPreSerialize(ObjectEvent $event)
    {
        /** @var Response $response */
        $response = $event->getObject();

        /** @var User|null $user */
        $user = $this->token->getToken()->getUser();

        if ($user instanceof User) {
            $response->setUserHasVote(
                $this->repository->userHasVoteFor($response, $user)
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
                'event' => 'serializer.pre_serialize', 'class' => Response::class, 'method' => 'onPreSerialize'
            ],
        ];
    }
}

<?php

namespace UserBundle\EventListener\Serialization;

use CoreBundle\Repository\HistoryRepository;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use UserBundle\Entity\User;

class UserListener implements EventSubscriberInterface
{
    /**
     * @var HistoryRepository
     */
    private $repository;


    /**
     * UserListener constructor.
     *
     * @param HistoryRepository $repository
     */
    public function __construct(HistoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param ObjectEvent $event
     */
    public function onPreSerialize(ObjectEvent $event)
    {
        /** @var User $user */
        $user = $event->getObject();

        $user->setScore($this->repository->countScoreForUser($user));
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents() : array
    {
        // https://github.com/schmittjoh/serializer/pull/677
        return [
            ['event' => 'serializer.pre_serialize', 'class' => 'Proxies\__CG__\UserBundle\Entity\User', 'method' => 'onPreSerialize'],
            ['event' => 'serializer.pre_serialize', 'class' => User::class, 'method' => 'onPreSerialize']
        ];
    }
}

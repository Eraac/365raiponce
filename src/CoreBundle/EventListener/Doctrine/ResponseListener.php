<?php

namespace CoreBundle\EventListener\Doctrine;

use CoreBundle\Entity\Response;
use CoreBundle\Event\ResponsePublishedEvent;
use CoreBundle\Event\ResponseUnpublishedEvent;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ResponseListener
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
     * @param Response           $response
     * @param LifecycleEventArgs $event
     */
    public function prePersistHandler(Response $response, LifecycleEventArgs $event)
    {
        if ($this->isValidUser($response)) {
            $response->setPostedAt(new \DateTime());
            $this->dispatchPublishedEvent($response);
        }
    }

    /**
     * @param Response           $response
     * @param PreUpdateEventArgs $event
     */
    public function preUpdateHandler(Response $response, PreUpdateEventArgs $event)
    {
        if ($event->hasChangedField('postedAt')) {
            /** @var Response $response */
            $response = $event->getEntity();

            if (is_null($event->getOldValue('postedAt'))) {
                $this->dispatchPublishedEvent($response);
            } else if (is_null($event->getNewValue('postedAt'))) {
                $this->dispatchUnpublishedEvent($response);
            }
        }
    }

    /**
     * @param Response $response
     */
    private function dispatchPublishedEvent(Response $response)
    {
        $event = new ResponsePublishedEvent($response);

        $this->dispatcher->dispatch(ResponsePublishedEvent::NAME, $event);
    }

    /**
     * @param Response $response
     */
    private function dispatchUnpublishedEvent(Response $response)
    {
        $event = new ResponseUnpublishedEvent($response);

        $this->dispatcher->dispatch(ResponseUnpublishedEvent::NAME, $event);
    }

    /**
     * @param Response $response
     *
     * @return bool
     */
    private function isValidUser(Response $response) : bool
    {
        $user = $response->getAuthor();

        return is_null($user) ? false : $user->isConfirmed();
    }
}

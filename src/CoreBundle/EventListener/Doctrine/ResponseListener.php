<?php

namespace CoreBundle\EventListener\Doctrine;

use CoreBundle\Entity\Response;
use Doctrine\ORM\Event\LifecycleEventArgs;

class ResponseListener
{
    public function prePersistHandler(Response $response, LifecycleEventArgs $event)
    {
        if ($this->isValidUser($response)) {
            $response->setPostedAt(new \DateTime());
        }
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

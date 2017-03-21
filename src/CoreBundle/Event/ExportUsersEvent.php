<?php

namespace CoreBundle\Event;

use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\EventDispatcher\Event;

class ExportUsersEvent extends Event
{
    const NAME = 'core.export.users';

    /**
     * @var UserInterface
     */
    protected $user;


    /**
     * ExportUsersEvent constructor.
     *
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function getUser() : UserInterface
    {
        return $this->user;
    }
}

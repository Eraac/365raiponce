<?php

namespace CoreBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class ExportUsersEvent extends Event
{
    const NAME = 'core.export.users';

    /**
     * @var string
     */
    protected $email;


    /**
     * ExportUsersEvent constructor.
     *
     * @param string $to
     */
    public function __construct(string $to)
    {
        $this->email = $to;
    }

    public function getEmail() : string
    {
        return $this->email;
    }
}

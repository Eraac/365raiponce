<?php

namespace CoreBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class HistoryEvent extends Event
{
    /**
     * @var string
     */
    protected $action;


    /**
     * HistoryEvent constructor.
     *
     * @param string $action
     */
    public function __construct(string $action)
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getActionName() : string
    {
        return $this->action;
    }
}

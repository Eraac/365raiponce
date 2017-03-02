<?php

namespace CoreBundle\Event\Dispatcher;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class DelayedEventDispatcher
{
    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * @var array
     */
    private $queue;

    /**
     * @var boolean
     */
    private $ready;


    /**
     * DelayedEventDispatcher constructor.
     *
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
        $this->queue = [];
        $this->ready = false;
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch($eventName, Event $event = null)
    {
        if (!$this->ready) {
            $this->queue[] = ['name' => $eventName, 'instance' => $event];

            return $event;
        }

        return $this->dispatcher->dispatch($eventName, $event);
    }

    /**
     * Set ready
     */
    public function setReady()
    {
        if (!$this->ready) {
            $this->ready = true;

            while ($event = array_shift($this->queue)) {
                $this->dispatcher->dispatch($event['name'], $event['instance']);
            }
        }
    }
}

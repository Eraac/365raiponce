<?php

namespace CoreBundle\EventListener\Doctrine;

use CoreBundle\Entity\History;
use CoreBundle\Service\ScoreControl;
use Doctrine\ORM\Event\LifecycleEventArgs;

class HistoryListener
{
    /**
     * @var ScoreControl
     */
    private $scoreControl;


    /**
     * HistoryListener constructor.
     *
     * @param ScoreControl $scoreControl
     */
    public function __construct(ScoreControl $scoreControl)
    {
        $this->scoreControl = $scoreControl;
    }

    /**
     * @param History $history
     * @param LifecycleEventArgs $event
     */
    public function prePersistHandler(History $history, LifecycleEventArgs $event)
    {
        $hasReachedLimit = $this->scoreControl->hasReachedLimit($history->getUser(), $history->getAction(), $history->getDate());

        $history->setUsedForScore(!$hasReachedLimit);
    }
}

<?php

namespace CoreBundle\Service;

use CoreBundle\Entity\Action;
use CoreBundle\Repository\HistoryRepository;
use UserBundle\Entity\User;

class ScoreControl
{
    /**
     * @var HistoryRepository
     */
    private $historyRepository;


    /**
     * ScoreControl constructor.
     *
     * @param HistoryRepository $historyRepository
     */
    public function __construct(HistoryRepository $historyRepository = null)
    {
        $this->historyRepository = $historyRepository;
    }

    /**
     * @param User           $user
     * @param Action         $action
     * @param \DateTime|null $day
     *
     * @return bool
     */
    public function hasReachedLimit(User $user, Action $action, \DateTime $day = null) : bool
    {
        if (is_null($action->getLimitPerDay())) {
            return false;
        }

        $count = $this->historyRepository->countActionForUserAndDay($action, $user, $day ?? new \DateTime('today'));

        return $count >= $action->getLimitPerDay();
    }
}

<?php

namespace CoreBundle\Event\History;

use CoreBundle\Entity\AbstractVote;
use CoreBundle\Event\HistoryEvent;

class HistoryGiveVoteEvent extends HistoryEvent
{
    const NAME = 'core.history.give_vote';

    /**
     * @var AbstractVote
     */
    protected $vote;


    /**
     * HistoryResponseEvent constructor.
     *
     * @param string $action
     * @param AbstractVote $vote
     */
    public function __construct(string $action, AbstractVote $vote)
    {
        parent::__construct($action);

        $this->vote = $vote;
    }

    /**
     * @return AbstractVote
     */
    public function getVote() : AbstractVote
    {
        return $this->vote;
    }
}

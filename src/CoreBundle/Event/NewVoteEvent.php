<?php

namespace CoreBundle\Event;

use CoreBundle\Entity\AbstractVote;
use Symfony\Component\EventDispatcher\Event;

class NewVoteEvent extends Event
{
    const NAME = 'core.new.vote';

    /**
     * @var AbstractVote
     */
    protected $vote;


    /**
     * NewVoteEvent constructor.
     *
     * @param AbstractVote $vote
     */
    public function __construct(AbstractVote $vote)
    {
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

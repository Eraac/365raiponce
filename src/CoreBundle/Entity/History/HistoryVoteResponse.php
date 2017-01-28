<?php

namespace CoreBundle\Entity\History;

use CoreBundle\Entity\History;
use CoreBundle\Entity\VoteResponse;
use Doctrine\ORM\Mapping as ORM;

/**
 * HistoryResponse
 *
 * @ORM\Entity()
 */
class HistoryVoteResponse extends History
{
    /**
     * @var VoteResponse
     *
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\VoteResponse")
     * @ORM\JoinColumn(name="vote_response_id", onDelete="CASCADE")
     */
    private $vote;

    /**
     * @return VoteResponse
     */
    public function getVote() : VoteResponse
    {
        return $this->vote;
    }

    /**
     * @param VoteResponse $vote
     *
     * @return HistoryVoteResponse
     */
    public function setVote(VoteResponse $vote) : HistoryVoteResponse
    {
        $this->vote = $vote;

        return $this;
    }
}

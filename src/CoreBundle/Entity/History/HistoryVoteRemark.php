<?php

namespace CoreBundle\Entity\History;

use CoreBundle\Entity\History;
use CoreBundle\Entity\VoteRemark;
use Doctrine\ORM\Mapping as ORM;

/**
 * HistoryVoteRemark
 *
 * @ORM\Entity()
 */
class HistoryVoteRemark extends History
{
    /**
     * @var VoteRemark
     *
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\VoteRemark")
     * @ORM\JoinColumn(name="vote_remark_id", onDelete="CASCADE")
     */
    private $vote;

    /**
     * @return VoteRemark
     */
    public function getVote() : VoteRemark
    {
        return $this->vote;
    }

    /**
     * @param VoteRemark $vote
     *
     * @return HistoryVoteRemark
     */
    public function setVote(VoteRemark $vote) : HistoryVoteRemark
    {
        $this->vote = $vote;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate() : \DateTime
    {
        return $this->vote->getCreatedAt();
    }
}

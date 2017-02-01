<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use UserBundle\Entity\User;

/**
 * History
 *
 * @ORM\Table(name="history")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\HistoryRepository")
 *
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *     "response_published" = "CoreBundle\Entity\History\HistoryResponsePublished",
 *     "vote_response"      = "CoreBundle\Entity\History\HistoryVoteResponse",
 *     "vote_remark"        = "CoreBundle\Entity\History\HistoryVoteRemark",
 *     "receive_vote"       = "CoreBundle\Entity\History\HistoryReceiveVote",
 *     "share_remark"       = "CoreBundle\Entity\History\HistoryShareRemark"
 * })
 */
abstract class History
{
    use TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * If this action in your history count for your total score (false in case you have exceeded limit per day)
     *
     * @var boolean
     *
     * @ORM\Column(name="is_used_for_score", type="boolean")
     */
    private $usedForScore;

    /**
     * @var Action
     *
     * @ORM\ManyToOne(targetEntity="Action", fetch="EAGER")
     */
    private $action;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     */
    private $user;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set action
     *
     * @param Action $action
     *
     * @return History
     */
    public function setAction(Action $action = null)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return Action
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return boolean
     */
    public function isUsedForScore() : bool
    {
        return $this->usedForScore;
    }

    /**
     * @param boolean $usedForScore
     *
     * @return History
     */
    public function setUsedForScore(bool $usedForScore) : History
    {
        $this->usedForScore = $usedForScore;

        return $this;
    }

    /**
     * Set user
     *
     * @param User $user
     *
     * @return History
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Return day on when this happen
     *
     * @return \DateTime
     */
    abstract public function getDate() : \DateTime;
}

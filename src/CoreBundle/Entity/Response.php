<?php

namespace CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use UserBundle\Entity\User;

/**
 * Response
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\ResponseRepository")
 */
class Response
{
    use TimestampableEntity;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="postedAt", type="datetime", nullable=true)
     */
    private $postedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="sentence", type="string", length=140)
     */
    private $sentence;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $author;

    /**
     * @var Remark
     *
     * @ORM\ManyToOne(targetEntity="Remark", inversedBy="responses")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $remark;

    /**
     * @ORM\OneToMany(targetEntity="VoteResponse", mappedBy="response", fetch="EAGER")
     */
    private $votes;

    /**
     * @var bool
     */
    private $userHasVote;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->votes = new ArrayCollection();
        $this->userHasVote = false;
    }

    /**
     * @return int
     */
    public function getCountVote() : int
    {
        return $this->votes->count();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set postedAt
     *
     * @param \DateTime $postedAt
     *
     * @return Response
     */
    public function setPostedAt(\DateTime $postedAt = null)
    {
        $this->postedAt = $postedAt;

        return $this;
    }

    /**
     * Get postedAt
     *
     * @return \DateTime
     */
    public function getPostedAt()
    {
        return $this->postedAt;
    }

    /**
     * Set sentence
     *
     * @param string $sentence
     * @return Response
     */
    public function setSentence(string $sentence)
    {
        $this->sentence = $sentence;

        return $this;
    }

    /**
     * Get sentence
     *
     * @return string
     */
    public function getSentence()
    {
        return $this->sentence;
    }

    /**
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param User $author
     *
     * @return Response
     */
    public function setAuthor(User $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Remark
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * @param mixed $remark
     *
     * @return Response
     */
    public function setRemark(Remark $remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPublished() : bool
    {
        return (null !== $this->postedAt);
    }

    /**
     * Add votes
     *
     * @param VoteResponse $vote
     * @return Response
     */
    public function addVote(VoteResponse $vote)
    {
        $this->votes[] = $vote;

        return $this;
    }

    /**
     * Remove votes
     *
     * @param VoteResponse $vote
     */
    public function removeVote(VoteResponse $vote)
    {
        $this->votes->removeElement($vote);
    }

    /**
     * Get votes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * @return boolean
     */
    public function isUserHasVote() : bool
    {
        return $this->userHasVote;
    }

    /**
     * @param boolean $userHasVote
     *
     * @return Response
     */
    public function setUserHasVote(bool $userHasVote) : Response
    {
        $this->userHasVote = $userHasVote;

        return $this;
    }
}

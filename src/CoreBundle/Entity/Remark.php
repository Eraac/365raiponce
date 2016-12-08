<?php

namespace CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Remark
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\RemarkRepository")
 */
class Remark
{
    use TimestampableEntity;
    
    /**
     * Id of the remark
     *
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Context of the sentence
     *
     * @var string
     *
     * @ORM\Column(name="context", type="text")
     */
    private $context;

    /**
     * The sentence that is sexist
     *
     * @var string
     *
     * @ORM\Column(name="sentence", type="string", length=140)
     */
    private $sentence;

    /**
     * Publish date of the remark
     *
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $postedAt;

    /**
     * Theme associate with the remark
     *
     * @var Theme
     *
     * @ORM\ManyToOne(targetEntity="Theme")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $theme;

    /**
     * Emotion feel by the person
     *
     * @var Emotion
     *
     * @ORM\ManyToOne(targetEntity="Emotion")
     * @ORM\JoinColumn(onDelete="SET NULL")
     */
    private $emotion;

    /**
     * How much person feel the emotion (from 1 (a bit) to 10 (a lot))
     *
     * @var integer
     *
     * @ORM\Column(name="scale_emotion", type="smallint")
     */
    private $scaleEmotion;

    /**
     * Email of the person
     *
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=140, nullable=true)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="Response", mappedBy="remark", fetch="EAGER")
     */
    private $responses;

    /**
     * @ORM\OneToMany(targetEntity="VoteRemark", mappedBy="remark", fetch="EAGER")
     */
    private $votes;

    /**
     * @var bool
     */
    private $userHasVoteSexist = false;

    /**
     * @var bool
     */
    private $userHasVoteLived = false;


    /**
     * Return the number of response
     *
     * @return int
     */
    public function countPublishedResponses() : int
    {
        // TODO optimize
        $criteria = Criteria::create()->where(Criteria::expr()->neq("postedAt", null));

        return $this->responses->matching($criteria)->count();
    }

    /**
     * Return the number of unpublished response (wait for moderation)
     *
     * @return int
     */
    public function countUnpublishedResponses() : int
    {
        // TODO optimize
        $criteria = Criteria::create()->where(Criteria::expr()->eq("postedAt", null));

        return $this->responses->matching($criteria)->count();
    }

    /**
     * Return the number of vote for 'is sexist'
     *
     * @return int
     */
    public function getCountVoteIsSexist() : int
    {
        // TODO optimize
        $criteria = Criteria::create()->where(Criteria::expr()->eq("type", VoteRemark::IS_SEXIST));

        return $this->votes->matching($criteria)->count();
    }

    /**
     * Return the number of vote for 'i have already lived this situation'
     *
     * @return int
     */
    public function getCountVoteAlreadyLive() : int
    {
        // TODO optimize
        $criteria = Criteria::create()->where(Criteria::expr()->eq("type", VoteRemark::ALREADY_LIVED));

        return $this->votes->matching($criteria)->count();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Set context
     *
     * @param string $context
     * @return Remark
     */
    public function setContext(string $context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * Get context
     *
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Set sentence
     *
     * @param string $sentence
     * @return Remark
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
     * Set postedAt
     *
     * @param \DateTime|null $postedAt
     * @return Remark
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
     * @return mixed
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param Theme $theme
     *
     * @return Remark
     */
    public function setTheme(Theme $theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return Remark
     */
    public function setEmail(string $email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Emotion|null
     */
    public function getEmotion()
    {
        return $this->emotion;
    }

    /**
     * @param mixed $emotion
     *
     * @return Remark
     */
    public function setEmotion(Emotion $emotion = null)
    {
        $this->emotion = $emotion;

        return $this;
    }

    /**
     * @return integer
     */
    public function getScaleEmotion()
    {
        return $this->scaleEmotion;
    }

    /**
     * @param integer $scaleEmotion
     *
     * @return Remark
     */
    public function setScaleEmotion(int $scaleEmotion)
    {
        $this->scaleEmotion = $scaleEmotion;

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
     * Constructor
     */
    public function __construct()
    {
        $this->responses = new ArrayCollection();
        $this->votes = new ArrayCollection();
    }

    /**
     * Add responses
     *
     * @param Response $response
     *
     * @return Remark
     */
    public function addResponse(Response $response)
    {
        $this->responses[] = $response;

        return $this;
    }

    /**
     * Remove response
     *
     * @param Response $response
     */
    public function removeResponse(Response $response)
    {
        $this->responses->removeElement($response);
    }

    /**
     * Get responses
     *
     * @return ArrayCollection
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * Add votes
     *
     * @param VoteRemark $vote
     *
     * @return Remark
     */
    public function addVote(VoteRemark $vote)
    {
        $this->votes[] = $vote;

        return $this;
    }

    /**
     * Remove votes
     *
     * @param VoteRemark $vote
     */
    public function removeVote(VoteRemark $vote)
    {
        $this->votes->removeElement($vote);
    }

    /**
     * Get votes
     *
     * @return ArrayCollection
     */
    public function getVotes() : ArrayCollection
    {
        return $this->votes;
    }

    /**
     * @return boolean
     */
    public function isUserHasVoteSexist() : bool
    {
        return $this->userHasVoteSexist;
    }

    /**
     * @return boolean
     */
    public function isUserHasVoteLived() : bool
    {
        return $this->userHasVoteLived;
    }

    /**
     * @param boolean $userHasVoteSexist
     * @param boolean $userHasVoteLived
     *
     * @return Remark
     */
    public function setUserHasVote(bool $userHasVoteSexist, bool $userHasVoteLived) : Remark
    {
        $this->userHasVoteSexist = $userHasVoteSexist;
        $this->userHasVoteLived  = $userHasVoteLived;

        return $this;
    }
}

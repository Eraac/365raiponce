<?php

namespace LKE\RemarkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use LKE\VoteBundle\Entity\VoteRemark;
use Symfony\Component\Validator\Constraints as Assert;
use LKE\UserBundle\Interfaces\PublishableInterface;
use Doctrine\Common\Collections\Criteria;

/**
 * Remark
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="LKE\RemarkBundle\Repository\RemarkRepository")
 * @JMS\ExclusionPolicy("all")
 * @ORM\HasLifecycleCallbacks()
 */
class Remark implements PublishableInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @JMS\Expose()
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="context", type="text")
     * @JMS\Expose()
     * @JMS\Groups({"detail-remark", "admin-remark"})
     * @Assert\NotBlank()
     */
    private $context;

    /**
     * @var string
     *
     * @ORM\Column(name="sentence", type="string", length=140)
     * @JMS\Expose()
     * @Assert\NotBlank()
     * @Assert\Length(max = 140)
     */
    private $sentence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="postedAt", type="datetime", nullable=true)
     * @JMS\Expose()
     */
    private $postedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @JMS\Expose()
     * @JMS\Groups({"admin-remark"})
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     * @JMS\Expose()
     */
    private $updatedAt;

    /**
     * @var LKE\RemarkBundle\Entity\Theme
     *
     * @ORM\ManyToOne(targetEntity="LKE\RemarkBundle\Entity\Theme")
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @JMS\Expose()
     * @Assert\Valid()
     * @Assert\NotNull()
     */
    private $theme;

    /**
     * @var LKE\RemarkBundle\Entity\Emotion
     *
     * @ORM\ManyToOne(targetEntity="LKE\RemarkBundle\Entity\Emotion")
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @JMS\Expose()
     * @Assert\Valid()
     * @Assert\NotNull()
     */
    private $emotion;

    /**
     * @var integer
     *
     * @ORM\Column(name="scale_emotion", type="smallint")
     * @JMS\Expose()
     * @Assert\Range(
     *      min = 1,
     *      max = 10
     * )
     * @Assert\NotBlank()
     */
    private $scaleEmotion;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=140, nullable=true)
     * @JMS\Expose()
     * @JMS\Groups({"admin-remark"})
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="LKE\RemarkBundle\Entity\Response", mappedBy="remark")
     */
    private $responses;

    /**
     * @ORM\OneToMany(targetEntity="LKE\VoteBundle\Entity\VoteRemark", mappedBy="remark")
     */
    private $votes;

    /**
     * @JMS\Groups({"stats"})
     * @JMS\Expose()
     */
    private $userHasVoteForIsSexist;

    /**
     * @JMS\Groups({"stats"})
     * @JMS\Expose()
     */
    private $userHasVoteForAlreadyLived;

    /**
     * @JMS\VirtualProperty()
     */
    public function countResponses()
    {
        $criteria = Criteria::create()->where(Criteria::expr()->neq("postedAt", null));

        return count($this->responses->matching($criteria));
    }

    /**
     * @JMS\VirtualProperty()
     * @JMS\Groups({"stats"})
     */
    public function getCountVoteIsSexist()
    {
        $criteria = Criteria::create()->where(Criteria::expr()->eq("type", VoteRemark::IS_SEXIST));

        return count($this->votes->matching($criteria));
    }

    /**
     * @JMS\VirtualProperty()
     * @JMS\Groups({"stats"})
     */
    public function getCountVoteAlreadyLive()
    {
        $criteria = Criteria::create()->where(Criteria::expr()->eq("type", VoteRemark::ALREADY_LIVED));

        return count($this->votes->matching($criteria));
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
     * Set context
     *
     * @param string $context
     * @return Remark
     */
    public function setContext($context)
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
    public function setSentence($sentence)
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
     * @param \DateTime $postedAt
     * @return Remark
     */
    public function setPostedAt($postedAt)
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
     * Set createAt
     *
     * @param \DateTime $createdAt
     * @return Remark
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param mixed $theme
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Set createdAt
     *
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function onUpdate()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmotion()
    {
        return $this->emotion;
    }

    /**
     * @param mixed $emotion
     */
    public function setEmotion($emotion)
    {
        $this->emotion = $emotion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getScaleEmotion()
    {
        return $this->scaleEmotion;
    }

    /**
     * @param mixed $scaleEmotion
     */
    public function setScaleEmotion($scaleEmotion)
    {
        $this->scaleEmotion = $scaleEmotion;

        return $this;
    }

    public function isPublished()
    {
        return (null !== $this->postedAt);
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->responses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add responses
     *
     * @param \LKE\RemarkBundle\Entity\Response $responses
     * @return Remark
     */
    public function addResponse(\LKE\RemarkBundle\Entity\Response $responses)
    {
        $this->responses[] = $responses;

        return $this;
    }

    /**
     * Remove responses
     *
     * @param \LKE\RemarkBundle\Entity\Response $responses
     */
    public function removeResponse(\LKE\RemarkBundle\Entity\Response $responses)
    {
        $this->responses->removeElement($responses);
    }

    /**
     * Get responses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * Add votes
     *
     * @param \LKE\VoteBundle\Entity\VoteRemark $votes
     * @return Remark
     */
    public function addVote(\LKE\VoteBundle\Entity\VoteRemark $votes)
    {
        $this->votes[] = $votes;

        return $this;
    }

    /**
     * Remove votes
     *
     * @param \LKE\VoteBundle\Entity\VoteRemark $votes
     */
    public function removeVote(\LKE\VoteBundle\Entity\VoteRemark $votes)
    {
        $this->votes->removeElement($votes);
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
    public function getUserHasVoteForIsSexist()
    {
        return $this->userHasVoteForIsSexist;
    }

    /**
     * @param boolean $userHasVoteForIsSexist
     */
    public function setUserHasVoteForIsSexist($userHasVoteForIsSexist)
    {
        $this->userHasVoteForIsSexist = $userHasVoteForIsSexist;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getUserHasVoteForAlreadyLived()
    {
        return $this->userHasVoteForAlreadyLived;
    }

    /**
     * @param boolean $userHasVoteForAlreadyLived
     */
    public function setUserHasVoteForAlreadyLived($userHasVoteForAlreadyLived)
    {
        $this->userHasVoteForAlreadyLived = $userHasVoteForAlreadyLived;

        return $this;
    }
}

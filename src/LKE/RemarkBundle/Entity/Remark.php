<?php

namespace LKE\RemarkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use LKE\UserBundle\Interfaces\PublishableInterface;

/**
 * Remark
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="LKE\RemarkBundle\Entity\RemarkRepository")
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
     * @JMS\Groups({"detail-remark"})
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
     * @ORM\ManyToOne(targetEntity="LKE\RemarkBundle\Entity\Theme")
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @JMS\Expose()
     * @Assert\Valid()
     * @Assert\NotNull()
     */
    private $theme;

    /**
     * @ORM\ManyToOne(targetEntity="LKE\RemarkBundle\Entity\Emotion")
     * @ORM\JoinColumn(onDelete="SET NULL")
     * @JMS\Expose()
     * @Assert\Valid()
     * @Assert\NotNull()
     */
    private $emotion;

    /**
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
     * @ORM\Column(name="email", type="string", length=140, nullable=true)
     * @JMS\Expose()
     * @JMS\Groups({"admin-remark"})
     */
    private $email;

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
}

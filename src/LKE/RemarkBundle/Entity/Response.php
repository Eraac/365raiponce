<?php

namespace LKE\RemarkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use LKE\UserBundle\Interfaces\OwnableInterface;
use LKE\UserBundle\Interfaces\PublishableInterface;

/**
 * Response
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="LKE\RemarkBundle\Entity\ResponseRepository")
 * @JMS\ExclusionPolicy("all")
 * @ORM\HasLifecycleCallbacks()
 */
class Response implements OwnableInterface, PublishableInterface
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
     * @JMS\Groups({"admin-response"})
     * @JMS\Expose()
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
     * @var string
     *
     * @ORM\Column(name="sentence", type="string", length=140)
     * @JMS\Expose()
     * @Assert\NotBlank()
     * @Assert\Length(max = 140)
     */
    private $sentence;

    /**
     * @ORM\ManyToOne(targetEntity="LKE\UserBundle\Entity\User")
     * @ORM\JoinColumn(onDelete="CASCADE")
     * @JMS\Expose()
     * @Assert\Valid()
     * @Assert\NotNull()
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="LKE\RemarkBundle\Entity\Remark")
     * @ORM\JoinColumn(onDelete="CASCADE")
     * @Assert\Valid()
     * @Assert\NotNull()
     */
    private $remark;


    /**
     * @JMS\VirtualProperty()
     */
    public function getRemarkId()
    {
        return $this->remark->getId();
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
     * @return Response
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
     * @return Response
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
     * Set updateAt
     *
     * @param \DateTime $updatedAt
     * @return Response
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set sentence
     *
     * @param string $sentence
     * @return Response
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
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->postedAt = null;
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
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * @param mixed $remark
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    public function isPublished()
    {
        return (null !== $this->postedAt);
    }

    public function getOwner()
    {
        return $this->author;
    }
}

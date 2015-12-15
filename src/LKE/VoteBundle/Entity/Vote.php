<?php

namespace LKE\VoteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use LKE\UserBundle\Interfaces\ReadAccessInterface;
use LKE\UserBundle\Interfaces\OwnableInterface;

/**
 * Vote
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="LKE\VoteBundle\Entity\VoteRepository")
 * @JMS\ExclusionPolicy("all")
 * @ORM\HasLifecycleCallbacks()
 */
class Vote implements ReadAccessInterface, OwnableInterface
{
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
     * @ORM\Column(name="createAt", type="datetime")
     * @JMS\Expose()
     * @JMS\Groups({"my-vote"})
     */
    private $createAt;

    /**
     * @ORM\ManyToOne(targetEntity="LKE\RemarkBundle\Entity\Response", inversedBy="votes")
     */
    private $response;

    /**
     * @ORM\ManyToOne(targetEntity="LKE\UserBundle\Entity\User")
     */
    private $user;

    /**
     * @JMS\VirtualProperty()
     * @JMS\Groups({"admin-vote"})
     */
    public function getAuthorId()
    {
        return $this->user->getId();
    }

    /**
     * @JMS\VirtualProperty()
     * @JMS\Groups({"my-vote", "admin-vote"})
     */
    public function getResponseId()
    {
        return $this->response->getId();
    }

    /**
     * Set createdAt
     *
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->createAt = new \DateTime();
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
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return Vote
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime 
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $remark
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getOwner()
    {
        return $this->user;
    }
}

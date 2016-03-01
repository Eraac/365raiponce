<?php

namespace LKE\VoteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use LKE\RemarkBundle\Entity\Remark;

/**
 * VoteRemark
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="LKE\VoteBundle\Repository\VoteRemarkRepository")
 */
class VoteRemark extends  AbstractVote
{
    const IS_SEXIST = 0;
    const ALREADY_LIVE = 1;
    const UNKNOWN = -1;


    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="smallint")
     * @JMS\Expose()
     * @JMS\Groups({"my-vote", "admin-vote"})
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="LKE\RemarkBundle\Entity\Remark", inversedBy="votes")
     */
    private $remark;

    /**
     * @JMS\VirtualProperty()
     * @JMS\Groups({"my-vote", "admin-vote"})
     */
    public function getRemarkId()
    {
        return $this->remark->getId();
    }


    /**
     * Set type
     *
     * @param integer $type
     * @return VoteRemark
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return Remark
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * @param Remark $remark
     */
    public function setRemark(Remark $remark)
    {
        $this->remark = $remark;

        return $this;
    }
}

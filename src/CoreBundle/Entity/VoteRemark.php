<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * VoteRemark
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\VoteRemarkRepository")
 * @UniqueEntity({"remark", "user", "type"}, message="core.error.already_vote_remark")
 */
class VoteRemark extends AbstractVote
{
    const IS_SEXIST     = 0;
    const ALREADY_LIVED = 1;

    const TYPES = [self::IS_SEXIST, self::ALREADY_LIVED];

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="smallint")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="Remark", inversedBy="votes")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $remark;


    /**
     * Set type
     *
     * @param integer $type
     *
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
     *
     * @return VoteRemark
     */
    public function setRemark(Remark $remark) : VoteRemark
    {
        $this->remark = $remark;

        return $this;
    }
}

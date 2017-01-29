<?php

namespace CoreBundle\Entity\History;

use CoreBundle\Entity\History;
use CoreBundle\Entity\Remark;
use Doctrine\ORM\Mapping as ORM;

/**
 * HistoryShareRemark
 *
 * @ORM\Entity()
 */
class HistoryShareRemark extends History
{
    /**
     * @var Remark
     *
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Remark")
     * @ORM\JoinColumn(name="remark_id", onDelete="CASCADE")
     */
    private $remark;

    /**
     * @return Remark
     */
    public function getRemark() : Remark
    {
        return $this->remark;
    }

    /**
     * @param Remark $remark
     *
     * @return HistoryShareRemark
     */
    public function setRemark(Remark $remark) : HistoryShareRemark
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate() : \DateTime
    {
        return $this->createdAt ?? new \DateTime();
    }
}

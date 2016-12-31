<?php

namespace CoreBundle\Model;

use CoreBundle\Entity\Remark;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class CollectionRemark
 *
 * @package CoreBundle\Model
 */
class CollectionRemark
{
    /**
     * @var ArrayCollection
     *
     * @Assert\Valid()
     */
    private $remarks;


    /**
     * CollectionModel constructor
     */
    public function __construct()
    {
        $this->remarks = new ArrayCollection();
    }

    /**
     * @return ArrayCollection
     */
    public function getRemarks() : ArrayCollection
    {
        return $this->remarks;
    }

    /**
     * @param ArrayCollection $remarks
     *
     * @return CollectionRemark
     */
    public function setRemarks(ArrayCollection $remarks) : CollectionRemark
    {
        $this->remarks = $remarks;

        return $this;
    }

    /**
     * @param Remark $remark
     *
     * @return CollectionRemark
     */
    public function addRemark(Remark $remark) : CollectionRemark
    {
        $this->remarks->add($remark);

        return $this;
    }

    /**
     * @param Remark $remark
     *
     * @return CollectionRemark
     */
    public function removeRemark(Remark $remark) : CollectionRemark
    {
        $this->remarks->removeElement($remark);

        return $this;
    }
}

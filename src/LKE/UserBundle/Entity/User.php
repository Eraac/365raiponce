<?php

namespace LKE\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="certificated", type="boolean", length=1, options={"default"=0})
     */
    private $certificated;

    public function __construct()
    {
        $this->certificated = false;

        parent::__construct();
    }

    /**
     * @return boolean
     */
    public function isCertificated()
    {
        return $this->certificated;
    }

    /**
     * @param boolean $certificated
     */
    public function setCertificated($certificated)
    {
        $this->certificated = $certificated;
    }
}

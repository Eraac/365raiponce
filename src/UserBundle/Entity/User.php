<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * User password
     *
     * @var string
     */
    protected $plainPassword;

    /**
     * If user has validate email
     *
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $confirmed;

    /**
     * @var int
     */
    private $score;


    /**
     * @return boolean
     */
    public function isConfirmed() : bool
    {
        return $this->confirmed;
    }

    /**
     * @param boolean $confirmed
     *
     * @return User
     */
    public function setConfirmed(bool $confirmed)
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * @return int
     */
    public function getScore() : int
    {
        return $this->score;
    }

    /**
     * @param int $score
     *
     * @return User
     */
    public function setScore(int $score) : User
    {
        $this->score = $score;

        return $this;
    }
}

<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * Emotion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\EmotionRepository")
 */
class Emotion
{
    /**
     * Id of the emotion
     *
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Name of the emotion
     *
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, unique=true)
     */
    private $name;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Emotion
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Action
 *
 * @ORM\Table(name="action")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\ActionRepository")
 */
class Action
{
    const GIVE_VOTE         = 'give_vote';
    const RECEIVE_VOTE      = 'receive_vote';
    const SHARE             = 'share';
    const PUBLISH_RESPONSE  = 'publish_response';

    const EVENTS = [
        self::GIVE_VOTE, self::RECEIVE_VOTE,
        self::SHARE, self::PUBLISH_RESPONSE
    ];

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="point", type="integer")
     */
    private $point;

    /**
     * Limit per day you can get this event to your history, `null` is unlimited
     *
     * @var int
     *
     * @ORM\Column(name="limitPerDay", type="smallint", nullable=true)
     */
    private $limitPerDay;

    /**
     * @var string
     *
     * @ORM\Column(name="event_name", type="string", length=255, unique=true)
     */
    private $eventName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set point
     *
     * @param integer $point
     *
     * @return Action
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get point
     *
     * @return int
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Set limitPerDay
     *
     * @param integer $limitPerDay
     *
     * @return Action
     */
    public function setLimitPerDay($limitPerDay)
    {
        $this->limitPerDay = $limitPerDay;

        return $this;
    }

    /**
     * Get limitPerDay
     *
     * @return int
     */
    public function getLimitPerDay()
    {
        return $this->limitPerDay;
    }

    /**
     * Set event name
     *
     * @param string $name
     *
     * @return Action
     */
    public function setEventName($name)
    {
        $this->eventName = $name;

        return $this;
    }

    /**
     * Get event name
     *
     * @return string
     */
    public function getName()
    {
        return $this->eventName;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Action
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}


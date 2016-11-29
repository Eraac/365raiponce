<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Report
 *
 * @ORM\Table()
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */
class Report
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
     * @ORM\Column(name="reportedAt", type="datetime")
     */
    private $reportedAt;

    /**
     * @var \CoreBundle\Entity\Response
     *
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Response")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $response;


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
     * Set reportedAt
     *
     * @param \DateTime $reportedAt
     *
     * @return Report
     */
    public function setReportedAt($reportedAt)
    {
        $this->reportedAt = $reportedAt;

        return $this;
    }

    /**
     * Get reportedAt
     *
     * @return \DateTime
     */
    public function getReportedAt()
    {
        return $this->reportedAt;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param Response $response
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
        $this->reportedAt = new \DateTime();
    }
}

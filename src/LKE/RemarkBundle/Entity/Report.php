<?php

namespace LKE\RemarkBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Report
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="LKE\RemarkBundle\Repository\ReportRepository")
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
     * @var \LKE\RemarkBundle\Entity\Response
     *
     * @ORM\ManyToOne(targetEntity="LKE\RemarkBundle\Entity\Response")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $response;


    public function __construct()
    {
        $this->reportedAt = new \DateTime();
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
     * Set reportedAt
     *
     * @param \DateTime $reportedAt
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
}

<?php

namespace CoreBundle\Entity\History;

use CoreBundle\Entity\History;
use CoreBundle\Entity\Response;
use Doctrine\ORM\Mapping as ORM;

/**
 * HistoryResponse
 *
 * @ORM\Entity()
 */
class HistoryResponsePublished extends History
{
    /**
     * @var Response
     *
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Response")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $response;

    /**
     * @return Response
     */
    public function getResponse() : Response
    {
        return $this->response;
    }

    /**
     * @param Response $response
     *
     * @return HistoryResponsePublished
     */
    public function setResponse(Response $response) : HistoryResponsePublished
    {
        $this->response = $response;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate() : \DateTime
    {
        return $this->response->getPostedAt();
    }
}

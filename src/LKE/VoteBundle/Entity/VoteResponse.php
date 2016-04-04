<?php

namespace LKE\VoteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * VoteResponse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="LKE\VoteBundle\Repository\VoteResponseRepository")
 */
class VoteResponse extends AbstractVote
{
    /**
     * @ORM\ManyToOne(targetEntity="LKE\RemarkBundle\Entity\Response", inversedBy="votes")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $response;

    /**
     * @JMS\VirtualProperty()
     * @JMS\Groups({"my-vote", "admin-vote"})
     */
    public function getResponseId()
    {
        return $this->response->getId();
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $remark
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }
}

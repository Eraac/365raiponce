<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * VoteResponse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\VoteResponseRepository")
 * @UniqueEntity({"response", "user"}, message="core.error.already_vote_response")
 */
class VoteResponse extends AbstractVote
{
    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\Response", inversedBy="votes")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $response;

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param Response $response
     *
     * @return VoteResponse
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }
}

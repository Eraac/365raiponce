<?php

namespace CoreBundle\Event;

use CoreBundle\Entity\Response;
use Symfony\Component\EventDispatcher\Event;

class ResponsePublishedEvent extends Event
{
    const NAME = 'core.published.response';

    /**
     * @var Response
     */
    protected $response;


    /**
     * ResponsePublishedEvent constructor.
     *
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function getResponse() : Response
    {
        return $this->response;
    }
}

<?php

namespace CoreBundle\Event\History;

use CoreBundle\Entity\Response;
use Symfony\Component\EventDispatcher\Event;

class HistoryResponseUnpublishedEvent extends Event
{
    const NAME = 'core.history.unpublish_response';

    /**
     * @var Response
     */
    protected $response;


    /**
     * HistoryResponseUnpublishedEvent constructor.
     *
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse() : Response
    {
        return $this->response;
    }
}

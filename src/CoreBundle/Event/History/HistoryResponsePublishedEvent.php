<?php

namespace CoreBundle\Event\History;

use CoreBundle\Entity\Response;
use CoreBundle\Event\HistoryEvent;

class HistoryResponsePublishedEvent extends HistoryEvent
{
    const NAME = 'core.history.publish_response';

    /**
     * @var Response
     */
    protected $response;


    /**
     * HistoryResponseEvent constructor.
     *
     * @param string $action
     * @param Response $response
     */
    public function __construct(string $action, Response $response)
    {
        parent::__construct($action);

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

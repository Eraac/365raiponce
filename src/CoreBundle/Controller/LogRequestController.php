<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\LogRequest;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Hateoas\Representation\PaginatedRepresentation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class LogRequestController
 *
 * @package CoreBundle\Controller
 *
 * @FOSRest\Version(AbstractApiController::ALL_API_VERSIONS)
 */
class LogRequestController extends AbstractApiController
{
    /**
     * Return collection of LogRequest
     *
     * @param Request $request
     *
     * @FOSRest\Get("/log-requests")
     * @FOSRest\View(serializerGroups={"Default"})
     *
     * @return PaginatedRepresentation
     */
    public function cgetAction(Request $request) : PaginatedRepresentation
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:LogRequest')->qbFindAll();
        $qb = $this->applyFilter('core.log_request_filter', $qb, $request);

        return $this->paginate($qb, $request);
    }

    /**
     * Return the LogRequest
     *
     * @FOSRest\Get("/log-requests/{log_request_id}")
     * @FOSRest\View(serializerGroups={"Default", "detail-logrequest"})
     *
     * @ParamConverter("logRequest", class="CoreBundle:LogRequest", options={"id" = "log_request_id"})
     *
     * @return LogRequest
     */
    public function getAction(LogRequest $logRequest) : LogRequest
    {
        return $logRequest;
    }
}

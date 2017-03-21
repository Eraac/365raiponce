<?php

namespace CoreBundle\Controller;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Docs\ExportDocs;
use CoreBundle\Event\ExportUsersEvent;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ExportController
 *
 * @package CoreBundle\Controller
 *
 * @FOSRest\Version(AbstractApiController::ALL_API_VERSIONS)
 */
class ExportController extends AbstractApiController implements ExportDocs
{
    /**
     * Export all users into a csv and send it by email
     *
     * @ApiDoc(ExportDocs::GET_USERS)
     *
     * @FOSRest\Get("/exports/users")
     * @FOSRest\View()
     *
     * @return JsonResponse
     */
    public function getUsersAction() : JsonResponse
    {
        $user = $this->getUser();

        $this->delayedDispatch(ExportUsersEvent::NAME, new ExportUsersEvent($user));

        return new JsonResponse([], JsonResponse::HTTP_ACCEPTED);
    }
}

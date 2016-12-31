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
 * @FOSRest\Version("1.0")
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
        $email = $this->getUser()->getEmail();

        $this->delayedDispatch(ExportUsersEvent::NAME, new ExportUsersEvent($email));

        return new JsonResponse([], JsonResponse::HTTP_ACCEPTED);
    }
}

<?php

namespace UserBundle\Controller;

use FOS\RestBundle\Controller\Annotations as FOSRest;
use CoreBundle\Annotation\ApiDoc;
use Hateoas\Representation\PaginatedRepresentation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Docs\MeDocs;

/**
 * Class MeController
 *
 * @package UserBundle\Controller
 *
 * @FOSRest\Version("1.0")
 *
 * @Security("is_granted('IS_AUTHENTICATED_REMEMBERED')")
 */
class MeController extends AbstractUserController implements MeDocs
{
    /**
     * Return collection of response of the user
     *
     * @return PaginatedRepresentation
     *
     * @ApiDoc(MeDocs::CGET_RESPONSES)
     *
     * @FOSRest\Get("/me/responses")
     * @FOSRest\View(serializerGroups={"Default", "stats", "info"})
     */
    public function cgetResponsesAction(Request $request) : PaginatedRepresentation
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:Response')->qbFindAllByUser($this->getUser());
        $qb = $this->applyFilter('core.response_filter', $qb, $request);

        return $this->paginate($qb, $request);
    }

    /**
     * Return the current user
     *
     * @ApiDoc(MeDocs::GET)
     *
     * @return Response
     */
    public function getAction() : Response
    {
        return $this->forward('UserBundle:User:get', [
            'user_id' => $this->getUser()->getId(),
        ]);
    }

    /**
     * Update the current user
     *
     * @ApiDoc(MeDocs::PATCH)
     *
     * @return Response
     */
    public function patchAction() : Response
    {
        return $this->forward('UserBundle:User:patch', [
            'user_id' => $this->getUser()->getId(),
        ]);
    }

    /**
     * Delete the current user
     *
     * @ApiDoc(MeDocs::DELETE)
     *
     * @return Response
     */
    public function deleteAction() : Response
    {
        return $this->forward('UserBundle:User:delete', [
            'user_id' => $this->getUser()->getId(),
        ]);
    }
}

<?php

namespace CoreBundle\Controller;

use CoreBundle\Annotation\ApiDoc;
//use CoreBundle\Docs\ResponseDocs;
use CoreBundle\Entity\Response;
use CoreBundle\Form\ResponseType;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Hateoas\Representation\PaginatedRepresentation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ResponseController
 *
 * @package CoreBundle\Controller
 *
 * @FOSRest\Version("1.0")
 */
class ResponseController extends AbstractApiController //implements ResponseDocs
{
    /**
     * Return collection of unpublished response
     *
     * @param Request $request
     *
     * @return PaginatedRepresentation
     *
     * ApiDoc(ResponseDocs::CGET_UNPUBLISHED)
     *
     * @Security("has_role('ROLE_ADMIN')")
     *
     * @FOSRest\View(serializerGroups={"Default", "stats"})
     */
    public function cgetUnpublishedAction(Request $request) : PaginatedRepresentation
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:Response')->qbFindAllUnpublished();
        $qb = $this->applyFilter('core.response_filter', $qb, $request);

        return $this->paginate($qb, $request);
    }

    /**
     * Return a response
     *
     * @param Response $response
     *
     * @return Response
     *
     * ApiDoc(ResponseDocs::GET)
     *
     * @Security("is_granted('view', response)")
     *
     * @FOSRest\Get("/responses/{response_id}", requirements={"response_id"="\d+"})
     * @FOSRest\View(serializerGroups={"Default", "stats"})
     *
     * @ParamConverter("response", class="CoreBundle:Response", options={"id" = "response_id"})
     */
    public function getAction(Response $response) : Response
    {
        return $response;
    }

    /**
     * Edit a response
     *
     * @param Request  $request
     * @param Response $response
     *
     * @return object|JsonResponse
     *
     * ApiDoc(ResponseDocs::PATCH)
     *
     * @Security("is_granted('edit', response)")
     *
     * @FOSRest\Patch("/responses/{response_id}", requirements={"response_id"="\d+"})
     * @FOSRest\View(serializerGroups={"Default", "stats"})
     *
     * @ParamConverter("response", class="CoreBundle:Response", options={"id" = "response_id"})
     */
    public function patchAction(Request $request, Response $response)
    {
        return $this->form($request, ResponseType::class, $response, ['method' => Request::METHOD_PATCH]);
    }

    /**
     * Delete a response
     *
     * @param Response $response
     *
     * @return object|JsonResponse
     *
     * ApiDoc(ResponseDocs::DELETE)
     *
     * @Security("is_granted('delete', response)")
     *
     * @FOSRest\Delete("/responses/{response_id}", requirements={"response_id"="\d+"})
     * @FOSRest\View()
     *
     * @ParamConverter("response", class="CoreBundle:Response", options={"id" = "response_id"})
     */
    public function deleteAction(Response $response)
    {
        $em = $this->getManager();

        $em->remove($response);
        $em->flush();
    }
}

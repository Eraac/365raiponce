<?php

namespace CoreBundle\Controller\Remark;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Controller\AbstractApiController;
use CoreBundle\Docs\ResponseDocs;
use CoreBundle\Entity\Remark;
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
 * @package CoreBundle\Controller\Remark
 *
 * @FOSRest\Version("1.0")
 */
class ResponseController extends AbstractApiController implements ResponseDocs
{
    /**
     * Return collection of response for a remark
     *
     * @param Request $request
     * @param Remark  $remark
     *
     * @return PaginatedRepresentation
     *
     * @ApiDoc(ResponseDocs::CGET)
     *
     * @Security("is_granted('viewPublishedResponses', remark)")
     *
     * @FOSRest\Get("/remarks/{remark_id}/responses", requirements={"remark_id"="\d+"}, name="get_remark_responses", options={"method_prefix" = false})
     * @FOSRest\View(serializerGroups={"Default", "stats", "info"})
     *
     * @ParamConverter("remark", class="CoreBundle:Remark", options={"id" = "remark_id"})
     */
    public function cgetAction(Request $request, Remark $remark) : PaginatedRepresentation
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:Response')->qbFindAllPublishedInRemark($remark);
        $qb = $this->applyFilter('core.response_filter', $qb, $request);

        return $this->paginate($qb, $request, ['remark_id' => $remark->getId()]);
    }

    /**
     * Add a response to a remark
     *
     * @param Request $request
     * @param Remark  $remark
     *
     * @return object|JsonResponse
     *
     * @ApiDoc(ResponseDocs::POST)
     *
     * @Security("is_granted('addResponse', remark)")
     *
     * @FOSRest\Post("/remarks/{remark_id}/responses", requirements={"remark_id"="\d+"}, name="post_remark_responses", options={"method_prefix" = false})
     * @FOSRest\View(serializerGroups={"Default"})
     *
     * @ParamConverter("remark", class="CoreBundle:Remark", options={"id" = "remark_id"})
     */
    public function postAction(Request $request, Remark $remark)
    {
        $response = new Response();

        $response
            ->setRemark($remark)
            ->setAuthor($this->getUser())
        ;

        return $this->form($request, ResponseType::class, $response, ['method' => Request::METHOD_POST]);
    }
}

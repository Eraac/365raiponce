<?php

namespace CoreBundle\Controller;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Docs\RemarkDocs;
use CoreBundle\Entity\Remark;
use CoreBundle\Form\RemarkType;
use CoreBundle\Form\RemarkEditType;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Hateoas\Representation\PaginatedRepresentation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RemarkController
 *
 * @package CoreBundle\Controller
 *
 * @FOSRest\Version(AbstractApiController::ALL_API_VERSIONS)
 */
class RemarkController extends AbstractApiController implements RemarkDocs
{
    /**
     * Return collection of Remark
     *
     * @ApiDoc(RemarkDocs::CGET)
     *
     * @param Request $request
     *
     * @FOSRest\View(serializerGroups={"Default", "stats", "meta"})
     *
     * @return PaginatedRepresentation
     */
    public function cgetAction(Request $request) : PaginatedRepresentation
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:Remark')->qbFindAllPublished();
        $qb = $this->applyFilter('core.remark_filter', $qb, $request);

        return $this->paginate($qb, $request);
    }

    /**
     * Return collection of unpublished Remark
     *
     * @ApiDoc(RemarkDocs::CGET_UNPUBLISHED)
     *
     * @param Request $request
     *
     * @FOSRest\View(serializerGroups={"Default", "stats", "meta"})
     *
     * @Security("is_granted('ROLE_ADMIN')")
     *
     * @return PaginatedRepresentation
     */
    public function cgetUnpublishedAction(Request $request) : PaginatedRepresentation
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:Remark')->qbFindAllUnpublished();
        $qb = $this->applyFilter('core.remark_filter', $qb, $request);

        return $this->paginate($qb, $request);
    }

    /**
     * Return the Remark
     *
     * @param Remark $remark
     *
     * @ApiDoc(RemarkDocs::GET)
     *
     * @Security("is_granted('view', remark)")
     *
     * @FOSRest\Get("/remarks/{remark_id}", requirements={"remark_id"="\d+"})
     * @FOSRest\View(serializerGroups={"Default", "stats", "meta"})
     *
     * @ParamConverter("remark", class="CoreBundle:Remark", options={"id" = "remark_id"})
     *
     * @return Remark
     */
    public function getAction(Remark $remark) : Remark
    {
        return $remark;
    }

    /**
     * Add an Remark
     *
     * @ApiDoc(RemarkDocs::POST)
     *
     * @param Request $request
     *
     * @return object|\Symfony\Component\HttpFoundation\JsonResponse
     *
     * @FOSRest\View(serializerGroups={"Default", "stats", "my", "meta"}, statusCode=JsonResponse::HTTP_CREATED)
     */
    public function postAction(Request $request)
    {
        $remark = new Remark();

        return $this->form($request, RemarkType::class, $remark, ['method' => Request::METHOD_POST]);
    }

    /**
     * Update an Remark
     *
     * @ApiDoc(RemarkDocs::PATCH)
     *
     * @param Request $request
     * @param Remark $remark
     *
     * @return object|\Symfony\Component\HttpFoundation\JsonResponse
     *
     * @Security("is_granted('edit', remark)")
     *
     * @ParamConverter("remark", class="CoreBundle:Remark", options={"id" = "remark_id"})
     *
     * @FOSRest\Patch("/remarks/{remark_id}", requirements={"remark_id"="\d+"})
     * @FOSRest\View(serializerGroups={"Default", "stats", "meta"})
     */
    public function patchAction(Request $request, Remark $remark)
    {
        return $this->form($request, RemarkEditType::class, $remark, ['method' => Request::METHOD_PATCH]);
    }

    /**
     * Delete an Remark
     *
     * @ApiDoc(RemarkDocs::DELETE)
     *
     * @param Remark $remark
     *
     * @Security("is_granted('delete', remark)")
     *
     * @ParamConverter("remark", class="CoreBundle:Remark", options={"id" = "remark_id"})
     *
     * @FOSRest\Delete("/remarks/{remark_id}", requirements={"remark_id"="\d+"})
     * @FOSRest\View()
     */
    public function deleteAction(Remark $remark)
    {
        $em = $this->getManager();

        $em->remove($remark);
        $em->flush();
    }
}

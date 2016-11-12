<?php

namespace CoreBundle\Controller\Remark;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Controller\AbstractApiController;
use CoreBundle\Docs\RemarkDocs;
use CoreBundle\Entity\Remark;
use FOS\RestBundle\Controller\Annotations as FOSRest;
//use Hateoas\Representation\PaginatedRepresentation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class RemarkController
 *
 * @package CoreBundle\Controller\Remark
 *
 * @FOSRest\Version("1.0")
 */
class RemarkController extends AbstractApiController implements RemarkDocs
{
    /**
     * Publish a remark
     *
     * @ApiDoc(RemarkDocs::PUBLISH)
     *
     * @param Remark $remark
     *
     * @return JsonResponse|null
     *
     * @Security("is_granted('publish', remark)")
     *
     * @FOSRest\Post("/remarks/{remark_id}/publish", requirements={"remark_id"="\d+"})
     * @FOSRest\View()
     *
     * @ParamConverter("remark", class="CoreBundle:Remark", options={"id" = "remark_id"})
     */
    public function postPublishAction(Remark $remark)
    {
        if ($remark->isPublished()) {
            return $this->createJsonError('core.error.remark.already_published', JsonResponse::HTTP_CONFLICT);
        }

        $remark->setPostedAt(new \DateTime());

        $em = $this->getManager();
        $em->persist($remark);
        $em->flush();
    }

    /**
     * Unpublish a remark
     *
     * @ApiDoc(RemarkDocs::UNPUBLISH)
     *
     * @param Remark $remark
     *
     * @return JsonResponse|null
     *
     * @Security("is_granted('unpublish', remark)")
     *
     * @FOSRest\Post("/remarks/{remark_id}/unpublish", requirements={"remark_id"="\d+"})
     * @FOSRest\View()
     *
     * @ParamConverter("remark", class="CoreBundle:Remark", options={"id" = "remark_id"})
     */
    public function postUnpublishAction(Remark $remark)
    {
        if (!$remark->isPublished()) {
            return $this->createJsonError('core.error.remark.unpublished_yet', JsonResponse::HTTP_CONFLICT);
        }

        $remark->setPostedAt(null);

        $em = $this->getManager();
        $em->persist($remark);
        $em->flush();
    }
}

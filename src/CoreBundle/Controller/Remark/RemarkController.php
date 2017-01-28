<?php

namespace CoreBundle\Controller\Remark;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Controller\AbstractApiController;
use CoreBundle\Docs\RemarkDocs;
use CoreBundle\Entity\Action;
use CoreBundle\Entity\Remark;
use CoreBundle\Event\History\HistoryShareRemarkEvent;
use CoreBundle\Service\Facebook;
use FOS\RestBundle\Controller\Annotations as FOSRest;
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

    /**
     * Add in history trace of sharing remark
     *
     * @ApiDoc(RemarkDocs::SHARE)
     *
     * @param Remark $remark
     *
     * @return JsonResponse|null
     *
     * @Security("is_granted('share', remark)")
     *
     * @FOSRest\Post("/remarks/{remark_id}/share", requirements={"remark_id"="\d+"})
     * @FOSRest\View()
     *
     * @ParamConverter("remark", class="CoreBundle:Remark", options={"id" = "remark_id"})
     */
    public function postShareAction(Remark $remark)
    {
        $repo = $this->getRepository('CoreBundle:History\HistoryShareRemark');

        $history = $repo->findBy([
            'user' => $this->getUser(),
            'remark' => $remark
        ]);

        if ($history) {
            return $this->createJsonError('core.error.remark.already_shared', JsonResponse::HTTP_CONFLICT);
        }

        $event = new HistoryShareRemarkEvent(Action::SHARE, $remark, $this->getUser());

        $this->delayedDispatch(HistoryShareRemarkEvent::NAME, $event);

        return new JsonResponse([], JsonResponse::HTTP_ACCEPTED);
    }
}

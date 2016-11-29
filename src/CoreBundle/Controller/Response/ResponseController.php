<?php

namespace CoreBundle\Controller\Response;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Controller\AbstractApiController;
use CoreBundle\Docs\ResponseDocs;
use CoreBundle\Entity\Report;
use CoreBundle\Entity\Response;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ResponseController
 *
 * @package CoreBundle\Controller\Response
 *
 * @FOSRest\Version("1.0")
 */
class ResponseController extends AbstractApiController implements ResponseDocs
{
    /**
     * Publish a response
     *
     * @ApiDoc(ResponseDocs::PUBLISH)
     *
     * @param Response $response
     *
     * @return JsonResponse|null
     *
     * @Security("is_granted('publish', response)")
     *
     * @FOSRest\Post("/responses/{response_id}/publish", requirements={"response_id"="\d+"})
     * @FOSRest\View()
     *
     * @ParamConverter("response", class="CoreBundle:Response", options={"id" = "response_id"})
     */
    public function postPublishAction(Response $response)
    {
        if ($response->isPublished()) {
            return $this->createJsonError('core.error.response.already_published', JsonResponse::HTTP_CONFLICT);
        }

        $response->setPostedAt(new \DateTime());

        $em = $this->getManager();
        $em->persist($response);
        $em->flush();
    }

    /**
     * Unpublish a response
     *
     * @ApiDoc(ResponseDocs::UNPUBLISH)
     *
     * @param Response $response
     *
     * @return JsonResponse|null
     *
     * @Security("is_granted('unpublish', response)")
     *
     * @FOSRest\Post("/responses/{response_id}/unpublish", requirements={"response_id"="\d+"})
     * @FOSRest\View()
     *
     * @ParamConverter("response", class="CoreBundle:Response", options={"id" = "response_id"})
     */
    public function postUnpublishAction(Response $response)
    {
        if (!$response->isPublished()) {
            return $this->createJsonError('core.error.response.unpublished_yet', JsonResponse::HTTP_CONFLICT);
        }

        $response->setPostedAt(null);

        $em = $this->getManager();
        $em->persist($response);
        $em->flush();
    }

    /**
     * Report inappropriate content
     *
     * @ApiDoc(ResponseDocs::REPORT)
     *
     * @param Response $response
     *
     * @Security("is_granted('report', response)")
     *
     * @FOSRest\Post("/responses/{response_id}/report", requirements={"response_id"="\d+"})
     * @FOSRest\View()
     *
     * @ParamConverter("response", class="CoreBundle:Response", options={"id" = "response_id"})
     */
    public function postReportAction(Response $response)
    {
        $report = new Report();
        $report->setResponse($response);

        $em = $this->getManager();
        $em->persist($report);
        $em->flush();
    }
}

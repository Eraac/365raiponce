<?php

namespace LKE\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use LKE\CoreBundle\Controller\CoreController;
use LKE\CoreBundle\Security\Voter;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ResponseController extends CoreController
{
    /**
     * @View(serializerGroups={"Default", "admin-response"})
     * @ApiDoc(
     *  section="Admin responses",
     *  description="List of unpublished responses",
     *  parameters={
     *      {"name"="limit", "dataType"="integer", "required"=false, "description"="Number max of results"},
     *      {"name"="page", "dataType"="integer", "required"=false, "description"="Page number"},
     *  }
     * )
     */
    public function getResponsesUnpublishedAction(Request $request)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 20);

        $responses = $this->getRepository()->getUnpublishedResponses($limit, $page - 1);

        return $responses;
    }

    /**
     * @View(serializerGroups={"Default", "detail-response"})
     * @Post("/responses/{id}/unpublish")
     * @param integer $id id of the response
     * @ApiDoc(
     *  section="Admin responses",
     *  description="Unpublish a response",
     *  output={
     *      "class"="LKE\RemarkBundle\Entity\Response",
     *      "groups"={"Default", "detail-response"}
     *  }
     * )
     */
    public function postResponseUnpublishAction($id)
    {
        $response = $this->getEntity($id, Voter::EDIT);

        $response->setPostedAt(null);

        $em = $this->getDoctrine()->getManager();
        $em->persist($response);
        $em->flush();

        return $response;
    }

    /**
     * @View(serializerGroups={"Default", "admin-response"})
     * @Post("/responses/{id}/publish")
     * @param integer $id id of the response
     * @ApiDoc(
     *  section="Admin responses",
     *  description="Publish a response",
     *  output={
     *      "class"="LKE\RemarkBundle\Entity\Response",
     *      "groups"={"Default", "detail-response"}
     *  }
     * )
     */
    public function postResponsePublishAction($id)
    {
        $response = $this->getEntity($id, Voter::EDIT);

        $response->setPostedAt(new \DateTime());

        $em = $this->getDoctrine()->getManager();
        $em->persist($response);
        $em->flush();

        return $response;
    }

    final protected function getRepositoryName()
    {
        return 'LKERemarkBundle:Response';
    }
}

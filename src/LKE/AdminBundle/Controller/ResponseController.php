<?php

namespace LKE\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use LKE\RemarkBundle\Form\Type\ResponseType;
use LKE\RemarkBundle\Entity\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;

class ResponseController extends Controller
{
    /**
     * @View(serializerGroups={"Default", "admin-response"})
     */
    public function getResponsesUnpublishedAction(Request $request)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 20);

        $responses = $this->getRepository()->getUnpublishedResponses($limit, $page - 1);

        return $responses;
    }

    /**
     * @View(serializerGroups={"Default", "admin-response"})
     * @Post("/responses/{id}/publish")
     */
    public function postResponsePublishAction($id)
    {
        $response = $this->get('lke_remark.get_response')->getResponse($id);

        $response->setPostedAt(new \DateTime());

        $em = $this->getDoctrine()->getManager();
        $em->persist($response);
        $em->flush();

        return $response;
    }

    private function getRepository()
    {
        return $this->getDoctrine()->getRepository('LKERemarkBundle:Response');
    }
}

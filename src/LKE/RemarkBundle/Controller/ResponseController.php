<?php

namespace LKE\RemarkBundle\Controller;

use LKE\RemarkBundle\Entity\Response;
use LKE\RemarkBundle\Form\Type\ResponseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;

// TODO Sécuriser lorsqu'on connecté ou non (à cause de this->getUser())
class ResponseController extends Controller
{
    /**
     *
     * @View(serializerGroups={"Default"})
     */
    public function getRemarkResponsesAction(Request $request, $id)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 30);

        $responses = $this->getRepository()->getResponsesByRemark($id, $this->getUser()->getId(), $limit, $page - 1);

        return $responses;
    }

    /**
     * @View(serializerGroups={"Default"})
     */
    public function getResponseAction($id)
    {
        return $this->get('lke_remark.get_response')->getResponse($id, $this->getUser());
    }

    /**
     * @View(serializerGroups={"Default"})
     */
    public function postRemarkResponseAction(Request $request, $id)
    {
        return $this->formResponse(new Response(), $request, "post", $id);
    }

    /**
     * @View(serializerGroups={"Default"})
     */
    public function patchResponseAction(Request $request, $id)
    {
        $response = $this->get('lke_remark.get_response')->getResponse($id, $this->getUser());

        // TODO check if can edit

        return $this->formResponse($response, $request, "patch");
    }

    /**
     * @View(serializerGroups={"Default"})
     */
    public function deleteResponseAction($id)
    {
        $response = $this->get('lke_remark.get_response')->getResponse($id, $this->getUser());

        $em = $this->getDoctrine()->getManager();
        $em->remove($response);
        $em->flush();

        return new JsonResponse(array(), 204);
    }

    /**
     * @View(serializerGroups={"Default"})
     */
    public function getMeResponsesAction(Request $request)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 30);

        $responses = $this->getRepository()->getMyResponses($this->getUser()->getId(), $limit, $page - 1);

        return $responses;
    }

    private function formResponse(Response $response, Request $request, $method = "post", $idRemark = null)
    {
        $form = $this->createForm(new ResponseType(), $response, array("method" => $method));

        $form->handleRequest($request);

        if ($form->isValid())
        {
            if (!is_null($idRemark)) // Only pass one per response (on post)
            {
                $remark = $this->get('lke_remark.get_remark')->getRemark($idRemark);
                $response->setRemark($remark);
                $response->setAuthor($this->getUser());
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($response);
            $em->flush();

            return $response;
        }

        return new JsonResponse(array(), 400); // TODO Error message
    }

    private function getRepository()
    {
        return $this->getDoctrine()->getRepository("LKERemarkBundle:Response");
    }
}

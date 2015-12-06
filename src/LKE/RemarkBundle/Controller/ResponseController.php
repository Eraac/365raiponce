<?php

namespace LKE\RemarkBundle\Controller;

use LKE\RemarkBundle\Entity\Response;
use LKE\RemarkBundle\Form\Type\ResponseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use LKE\UserBundle\Service\Access;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use FOS\RestBundle\Controller\Annotations\View;

class ResponseController extends Controller
{
    /**
     *
     * @View(serializerGroups={"Default"})
     */
    public function getRemarkResponsesAction(Request $request, $id)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 30);

        $responses = $this->getRepository()->getResponsesByRemark($id, $this->getUserId(), $limit, $page - 1);

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
     * @Security("is_granted('IS_AUTHENTICATED_REMEMBERED')")
     */
    public function postRemarkResponseAction(Request $request, $id)
    {
        // TODO empêcher de pouvoir publier sur des remarques non publié
        return $this->formResponse(new Response(), $request, "post", $id);
    }

    /**
     * @View(serializerGroups={"Default"})
     * @Security("is_granted('IS_AUTHENTICATED_REMEMBERED')")
     */
    public function patchResponseAction(Request $request, $id)
    {
        $response = $this->get('lke_remark.get_response')->getResponse($id, $this->getUser(), ACCESS::EDIT);

        return $this->formResponse($response, $request, "patch");
    }

    /**
     * @View(serializerGroups={"Default"})
     * @Security("is_granted('IS_AUTHENTICATED_REMEMBERED')")
     */
    public function deleteResponseAction($id)
    {
        $response = $this->get('lke_remark.get_response')->getResponse($id, $this->getUser(), Access::DELETE);

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

        $responses = $this->getRepository()->getMyResponses($this->getUserId(), $limit, $page - 1);

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

    private function getUserId()
    {
        $user = $this->getUser();

        return (is_null($user)) ? 0 : $user->getId();
    }
}

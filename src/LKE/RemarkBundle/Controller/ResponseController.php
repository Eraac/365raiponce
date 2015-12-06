<?php

namespace LKE\RemarkBundle\Controller;

use LKE\RemarkBundle\Entity\Response;
use LKE\RemarkBundle\Form\Type\ResponseType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use LKE\UserBundle\Service\Access;
use LKE\CoreBundle\Controller\CoreController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use FOS\RestBundle\Controller\Annotations\View;

class ResponseController extends CoreController
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
        return $this->getEntity($id);
    }

    /**
     * @View(serializerGroups={"Default"})
     * @Security("is_granted('IS_AUTHENTICATED_REMEMBERED')")
     */
    public function postRemarkResponseAction(Request $request, $id)
    {
        return $this->formResponse(new Response(), $request, "post", $id);
    }

    /**
     * @View(serializerGroups={"Default"})
     * @Security("is_granted('IS_AUTHENTICATED_REMEMBERED')")
     */
    public function patchResponseAction(Request $request, $id)
    {
        $response = $this->getEntity($id, ACCESS::EDIT);

        return $this->formResponse($response, $request, "patch");
    }

    /**
     * @View(serializerGroups={"Default"})
     * @Security("is_granted('IS_AUTHENTICATED_REMEMBERED')")
     */
    public function deleteResponseAction($id)
    {
        $response = $this->getEntity($id, Access::DELETE);

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
                $remark = $this->getEntity($idRemark, Access::READ, "LKERemarkBundle:Remark");
                $response->setRemark($remark);
                $response->setAuthor($this->getUser());
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($response);
            $em->flush();

            return $response;
        }

        return new JsonResponse($this->getAllErrors($form), 400);
    }

    final protected function getRepositoryName()
    {
        return "LKERemarkBundle:Response";
    }

    private function getUserId()
    {
        $user = $this->getUser();

        return (is_null($user)) ? 0 : $user->getId();
    }
}

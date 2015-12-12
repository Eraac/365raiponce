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
     * @View(serializerGroups={"Default", "stats"})
     */
    public function getRemarkResponsesAction(Request $request, $id)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 30);

        $responses = $this->getRepository()->getResponsesByRemarkComplet($id, $this->getUserId(), $limit, $page - 1);

        $this->setStats($responses);

        return $responses;
    }

    /**
     * @View(serializerGroups={"Default", "stats"})
     */
    public function getResponseAction($id)
    {
        $response = $this->getEntity($id);

        $this->setStatsOne($response);

        return $response;
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
     * @View(serializerGroups={"Default", "stats"})
     */
    public function getMeResponsesAction(Request $request)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 30);

        $responses = $this->getRepository()->getMyResponses($this->getUserId(), $limit, $page - 1);

        $this->setStats($responses);

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

    private function setStats($responses)
    {
        foreach ($responses as $response) {
            $this->setStatsOne($response);
        }
    }

    private function setStatsOne($response)
    {
        $repo = $this->getRepository();
        $user = $this->getUser();

        $userHasVote = $repo->userHasVote($response, $user);

        $response->setUserHasVote($userHasVote);
    }
}

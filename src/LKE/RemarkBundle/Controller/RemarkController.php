<?php

namespace LKE\RemarkBundle\Controller;

use LKE\RemarkBundle\Entity\Remark;
use LKE\RemarkBundle\Form\Type\RemarkType;
use LKE\CoreBundle\Controller\CoreController;
use LKE\UserBundle\Service\Access;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;

class RemarkController extends CoreController
{
    /**
     * @View(serializerGroups={"Default"})
     */
    public function getRemarksAction(Request $request)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 20);

        $remarks = $this->getRepository()->getPostedRemark($limit, $page - 1);

        return $remarks;
    }

    /**
     * @View(serializerGroups={"Default", "detail-remark"})
     */
    public function getRemarkAction($id)
    {
        return $this->getEntity($id, Access::READ);
    }

    /**
     * @View(serializerGroups={"Default", "detail-remark"})
     */
    public function postRemarkAction(Request $request)
    {
        return $this->formRemark(new Remark(), $request, "post");
    }

    /**
     * @View(serializerGroups={"Default"})
     */
    public function getMeRemarksAction(Request $request)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 20);
        $idUser = $this->getUser()->getId();

        $remarks = $this->getRepository()->getUserRemarks($idUser, $limit, $page - 1);

        return $remarks;
    }

    private function formRemark(Remark $remark, Request $request, $method = "post")
    {
        $form = $this->createForm(new RemarkType(), $remark, array("method" => $method));

        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($remark);
            $em->flush();

            return $remark;
        }

        return new JsonResponse($this->getAllErrors($form), 400);
    }

    final protected function getRepositoryName()
    {
        return "LKERemarkBundle:Remark";
    }
}

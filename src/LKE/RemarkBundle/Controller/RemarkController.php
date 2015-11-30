<?php

namespace LKE\RemarkBundle\Controller;

use LKE\RemarkBundle\Entity\Remark;
use LKE\RemarkBundle\Form\RemarkType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;

class RemarkController extends Controller
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
        return $this->getRemark($id);
    }

    /**
     * @View(serializerGroups={"Default", "detail-remark"})
     */
    public function postRemarkAction(Request $request)
    {
        return $this->formRemark(new Remark(), $request, "post");
    }

    /**
     * @View(serializerGroups={"Default", "detail-remark"})
     */
    public function patchRemarkAction(Request $request, $id)
    {
        $remark = $this->getRemark($id, true);

        return $this->formRemark($remark, $request, "patch");
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
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($remark);
            $em->flush();

            return $remark;
        }

        return new JsonResponse(array(), 400); // TODO Error message
    }

    private function getRemark($id, $edit = false)
    {
        $remark = $this->getRepository()->find($id);

        if (null === $remark) {
            throw $this->createNotFoundException();
        }

        // TODO check access (for read or edit)

        return $remark;
    }

    private function getRepository()
    {
        return $this->getDoctrine()->getRepository("LKERemarkBundle:Remark");
    }
}

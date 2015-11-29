<?php

namespace LKE\RemarkBundle\Controller;

use LKE\RemarkBundle\Entity\Remark;
use LKE\RemarkBundle\Form\RemarkType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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

        $remarks = $this->getRepository()->getPostedRemark($limit, $page);

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
        $remark = $this->getRemark($id);

        return $this->formRemark($remark, $request, "patch");
    }

    public function getMyRemarksAction()
    {
        // TODO
        return array();
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

        return $form; // TODO Ne pas retourner un code http 200
    }

    private function getRemark($id)
    {
        $remark = $this->getRepository()->find($id);

        if (null === $remark) {
            throw $this->createNotFoundException();
        }

        // TODO check access

        return $remark;
    }

    private function getRepository()
    {
        return $this->getDoctrine()->getRepository("LKERemarkBundle:Remark");
    }
}

<?php

namespace LKE\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use LKE\RemarkBundle\Form\Type\RemarkEditType;
use LKE\RemarkBundle\Entity\Remark;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;

class RemarkController extends Controller
{
    /**
     * @View(serializerGroups={"Default"})
     */
    public function getRemarksUnpublishedAction(Request $request)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 20);

        $remarks = $this->getRepository()->getUnpublishedRemark($limit, $page - 1);

        return $remarks;
    }

    /**
     * @View(serializerGroups={"Default", "detail-remark"})
     * @Post("/remarks/{id}/publish")
     */
    public function postRemarkPublishAction($id)
    {
        $remark = $this->get('lke_remark.get_remark')->getRemark($id);

        $remark->setPostedAt(new \DateTime());

        $em = $this->getDoctrine()->getManager();
        $em->persist($remark);
        $em->flush();

        return $remark;
    }

    /**
     * @View(serializerGroups={"Default", "detail-remark"})
     */
    public function patchRemarkAction(Request $request, $id)
    {
        $remark = $this->get('lke_remark.get_remark')->getRemark($id);

        return $this->formRemark($remark, $request);
    }

    private function formRemark(Remark $remark, Request $request)
    {
        $form = $this->createForm(new RemarkEditType(), $remark, array("method" => "patch"));

        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($remark);
            $em->flush();

            return $remark;
        }

        return new JsonResponse(array(), 400); // TODO Error message
    }

    public function deleteRemarkAction($id)
    {
        $remark = $this->get('lke_remark.get_remark')->getRemark($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($remark);
        $em->flush();

        return new JsonResponse(array(), 204);
    }

    private function getRepository()
    {
        return $this->getDoctrine()->getRepository('LKERemarkBundle:Remark');
    }
}

<?php

namespace LKE\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use LKE\RemarkBundle\Entity\Remark;
use LKE\CoreBundle\Controller\CoreController;
use LKE\RemarkBundle\Form\Type\RemarkEditType;
use LKE\CoreBundle\Security\Voter;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;

class RemarkController extends CoreController
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
     * @Post("/remarks/{id}/unpublish")
     */
    public function postRemarkUnpublishAction($id)
    {
        $remark = $this->getEntity($id, Voter::EDIT);

        $remark->setPostedAt(null);

        // TODO unpublish or remove comments too ?

        $em = $this->getDoctrine()->getManager();
        $em->persist($remark);
        $em->flush();

        return $remark;
    }

    /**
     * @View(serializerGroups={"Default", "detail-remark"})
     * @Post("/remarks/{id}/publish")
     */
    public function postRemarkPublishAction($id)
    {
        $remark = $this->getEntity($id, Voter::EDIT);

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
        $remark = $this->getEntity($id, Voter::EDIT);

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

        return new JsonResponse($this->getAllErrors($form), 400);
    }

    public function deleteRemarkAction($id)
    {
        $remark = $this->getEntity($id, Voter::DELETE);

        $em = $this->getDoctrine()->getManager();
        $em->remove($remark);
        $em->flush();

        return new JsonResponse(array(), 204);
    }

    final protected function getRepositoryName()
    {
        return 'LKERemarkBundle:Remark';
    }
}

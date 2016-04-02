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
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class RemarkController extends CoreController
{
    /**
     * @ApiDoc(
     *  section="Admin remarks",
     *  description="Get count of unpublished remark"
     * )
     */
    public function getRemarksUnpublishedCountAction()
    {
        $count = $this->getRepository()->countUnpublishedRemark();

        return array("count" => $count);
    }

    /**
     * @View(serializerGroups={"Default", "admin-remark"})
     * @ApiDoc(
     *  section="Admin remarks",
     *  description="List of unpublished remarks",
     *  parameters={
     *      {"name"="limit", "dataType"="integer", "required"=false, "description"="Number max of results"},
     *      {"name"="page", "dataType"="integer", "required"=false, "description"="Page number"},
     *  }
     * )
     */
    public function getRemarksUnpublishedAction(Request $request)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 20);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $this->getRepository()->queryUnpublishedRemark(),
            $page,
            $limit
        );

        $remarks = $pagination->getItems();

        return $remarks;
    }

    /**
     * @View(serializerGroups={"Default", "admin-remark"})
     * @ApiDoc(
     *  section="Remarks",
     *  description="Get one remark with admin information",
     *  output={
     *      "class"="LKE\RemarkBundle\Entity\Remark",
     *      "groups"={"Default", "admin-remark"}
     *  }
     * )
     */
    public function getRemarksAction($id)
    {
        $remark = $this->getEntity($id, Voter::VIEW, ["method" => "getCompleteRemark"]);

        return $remark;
    }

    /**
     * @View(serializerGroups={"Default", "detail-remark"})
     * @Post("/remarks/{id}/unpublish")
     * @param integer $id id of the remark
     * @ApiDoc(
     *  section="Admin remarks",
     *  description="Unpublish a remark",
     *  output={
     *      "class"="LKE\RemarkBundle\Entity\Remark",
     *      "groups"={"Default", "detail-remark"}
     *  }
     * )
     */
    public function postRemarkUnpublishAction($id)
    {
        $remark = $this->getEntity($id, Voter::EDIT);

        $remark->setPostedAt(null);

        $em = $this->getDoctrine()->getManager();
        $em->persist($remark);
        $em->flush();

        return $remark;
    }

    /**
     * @View(serializerGroups={"Default", "detail-remark"})
     * @Post("/remarks/{id}/publish")
     * @param integer $id id of the remark
     * @ApiDoc(
     *  section="Admin remarks",
     *  description="Publish a remark",
     *  output={
     *      "class"="LKE\RemarkBundle\Entity\Remark",
     *      "groups"={"Default", "detail-remark"}
     *  }
     * )
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
     * @param integer $id id of the remark
     * @ApiDoc(
     *  section="Admin remarks",
     *  description="Edit a remark",
     *  input="LKE\RemarkBundle\Form\Type\RemarkType",
     *  output={
     *      "class"="LKE\RemarkBundle\Entity\Remark",
     *      "groups"={"Default", "detail-remark"}
     *  }
     * )
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

    /**
     * @param integer $id id of the remark
     * @ApiDoc(
     *  section="Admin remarks",
     *  description="Delete a remark"
     * )
     *
     * @return JsonResponse
     */
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

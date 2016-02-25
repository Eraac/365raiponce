<?php

namespace LKE\RemarkBundle\Controller;

use LKE\RemarkBundle\Entity\Remark;
use LKE\RemarkBundle\Form\Type\RemarkType;
use LKE\CoreBundle\Controller\CoreController;
use LKE\CoreBundle\Security\Voter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class RemarkController extends CoreController
{
    /**
     * @View(serializerGroups={"Default", "admin-remark"})
     * @ApiDoc(
     *  section="Remarks",
     *  description="Get list of remarks",
     *  parameters={
     *      {"name"="limit", "dataType"="integer", "required"=false, "description"="Number max of results"},
     *      {"name"="page", "dataType"="integer", "required"=false, "description"="Page number"},
     *  }
     * )
     */
    public function getRemarksAction(Request $request)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 20);

        $remarks = $this->getRepository()->getPostedRemark($limit, $page - 1);

        return $remarks;
    }

    /**
     * @View(serializerGroups={"Default", "detail-remark"})
     * @param integer $id id of the remark
     * @ApiDoc(
     *  section="Remarks",
     *  description="Get one remark",
     *  output={
     *      "class"="LKE\RemarkBundle\Entity\Remark",
     *      "groups"={"Default", "detail-remark"}
     *  }
     * )
     */
    public function getRemarkAction($id)
    {
        return $this->getEntity($id, Voter::VIEW, ["method" => "getCompleteRemark"]);
    }

    /**
     * @View(serializerGroups={"Default", "detail-remark"})
     * @ApiDoc(
     *  section="Remarks",
     *  description="Add a remark",
     *  input="LKE\RemarkBundle\Form\Type\RemarkType",
     *  output={
     *      "class"="LKE\RemarkBundle\Entity\Remark",
     *      "groups"={"Default", "detail-remark"}
     *  }
     * )
     */
    public function postRemarkAction(Request $request)
    {
        return $this->formRemark(new Remark(), $request, "post");
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

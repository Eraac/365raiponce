<?php

namespace CoreBundle\Controller;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Docs\ImportDocs;
use CoreBundle\Form\CollectionRemarkType;
use CoreBundle\Model\CollectionRemark;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ImportController
 *
 * @package CoreBundle\Controller
 *
 * @FOSRest\Version("1.0")
 */
class ImportController extends AbstractApiController implements ImportDocs
{
    /**
     * Import many remarks
     *
     * @param Request $request
     *
     * @ApiDoc(ImportDocs::POST_REMARKS)
     *
     * @FOSRest\Post("/imports/remarks")
     * @FOSRest\View()
     *
     * @return mixed
     */
    public function postRemarkAction(Request $request)
    {
        $collectionRemark = new CollectionRemark();

        return $this->form($request, CollectionRemarkType::class, $collectionRemark, ['method' => Request::METHOD_POST]);
    }

    /**
     * Persist an entity
     *
     * @param CollectionRemark $collectionRemark
     */
    protected function persistEntity($collectionRemark)
    {
        $em = $this->getManager();

        $remarks = $collectionRemark->getRemarks();

        foreach ($remarks as $remark) {
            $em->persist($remark);
            $em->flush();
        }
    }
}

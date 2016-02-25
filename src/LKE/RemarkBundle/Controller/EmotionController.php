<?php

namespace LKE\RemarkBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;
use LKE\CoreBundle\Controller\CoreController;
use LKE\CoreBundle\Security\Voter;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class EmotionController extends CoreController
{
    /**
     * @View(serializerGroups={"Default"})
     * @ApiDoc(
     *  section="Emotions",
     *  description="Get list of emotions",
     *  parameters={
     *      {"name"="limit", "dataType"="integer", "required"=false, "description"="Number max of results"},
     *      {"name"="page", "dataType"="integer", "required"=false, "description"="Page number"},
     *  }
     * )
     */
    public function getEmotionsAction(Request $request)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 20);

        $emotions = $this->getRepository()->getEmotions($limit, $page - 1);

        return $emotions;
    }

    /**
     * @View(serializerGroups={"Default"})
     * @param string $slug slug of the emotion
     * @ApiDoc(
     *  section="Emotions",
     *  description="Get one emotion",
     *  output={
     *      "class"="LKE\RemarkBundle\Entity\Emotion",
     *      "groups"={"Default"}
     *  }
     * )
     */
    public function getEmotionAction($slug)
    {
        return $this->getEntity($slug, Voter::VIEW, ["method" => "findBySlug"]);
    }

    final protected function getRepositoryName()
    {
        return "LKERemarkBundle:Emotion";
    }
}

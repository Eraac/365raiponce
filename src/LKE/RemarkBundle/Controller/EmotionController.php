<?php

namespace LKE\RemarkBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;
use LKE\CoreBundle\Controller\CoreController;
use LKE\CoreBundle\Security\Voter;

class EmotionController extends CoreController
{
    /**
     * @View(serializerGroups={"Default"})
     */
    public function getEmotionsAction(Request $request)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 20);

        $emotions = $this->getRepository()->getEmotions($limit, $page - 1);

        return $emotions;
    }

    /**
     * @View(serializerGroups={"Default"})
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

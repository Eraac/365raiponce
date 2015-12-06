<?php

namespace LKE\RemarkBundle\Controller;

use LKE\UserBundle\Service\Access;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;
use LKE\CoreBundle\Controller\CoreController;

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
        return $this->getEntity($slug, Access::READ);
    }

    final protected function getRepositoryName()
    {
        return "LKERemarkBundle:Emotion";
    }
}

<?php

namespace LKE\RemarkBundle\Controller;

use LKE\RemarkBundle\Entity\Remark;
use LKE\RemarkBundle\Form\RemarkType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;

class EmotionController extends Controller
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
    public function getEmotionAction($id)
    {
        return $this->getEmotion($id);
    }

    private function getEmotion($id)
    {
        $emotion = $this->getRepository()->find($id);

        if (null === $emotion) {
            throw $this->createNotFoundException();
        }

        return $emotion;
    }

    private function getRepository()
    {
        return $this->getDoctrine()->getRepository("LKERemarkBundle:Emotion");
    }
}

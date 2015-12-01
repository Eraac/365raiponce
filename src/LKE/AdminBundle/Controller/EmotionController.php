<?php

namespace LKE\AdminBundle\Controller;

use LKE\RemarkBundle\Entity\Emotion;
use LKE\RemarkBundle\Form\EmotionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations\View;

class EmotionController extends Controller
{
    /**
     * @View(serializerGroups={"Default"})
     */
    public function postEmotionsAction(Request $request)
    {
        return $this->formEmotion(new Emotion(), $request, "post");
    }

    /**
     * @View(serializerGroups={"Default"})
     */
    public function patchEmotionsAction(Request $request, $slug)
    {
        $emotion = $this->get("lke_remark.get_emotion")->getEmotion($slug);

        return $this->formEmotion($emotion, $request, "patch");
    }

    private function formEmotion(Emotion $emotion, Request $request, $method = "post")
    {
        $form = $this->createForm(new EmotionType(), $emotion, array("method" => $method));

        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($emotion);
            $em->flush();

            return $emotion;
        }

        return new JsonResponse(array(), 400); // TODO Error message
    }
}

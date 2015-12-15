<?php

namespace LKE\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use LKE\CoreBundle\Security\Voter;
use LKE\RemarkBundle\Entity\Emotion;
use LKE\RemarkBundle\Form\Type\EmotionType;
use LKE\CoreBundle\Controller\CoreController;
use FOS\RestBundle\Controller\Annotations\View;

class EmotionController extends CoreController
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
        $emotion = $this->getEntity($slug, Voter::EDIT, ["method" => "findBySlug"]);

        return $this->formEmotion($emotion, $request, "patch");
    }

    public function deleteEmotionAction($slug)
    {
        $emotion = $this->getEntity($slug, Voter::DELETE, ["method" => "findBySlug"]);

        $em = $this->getDoctrine()->getManager();
        $em->remove($emotion);
        $em->flush();

        return new JsonResponse(array(), 204);
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

        return new JsonResponse($this->getAllErrors($form), 400);
    }

    final protected function getRepositoryName()
    {
        return "LKERemarkBundle:Emotion";
    }
}

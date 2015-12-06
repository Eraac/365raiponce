<?php

namespace LKE\AdminBundle\Controller;

use LKE\RemarkBundle\Entity\Theme;
use LKE\RemarkBundle\Form\Type\ThemeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use LKE\UserBundle\Service\Access;
use LKE\CoreBundle\Controller\CoreController;
use FOS\RestBundle\Controller\Annotations\View;

class ThemeController extends CoreController
{
    /**
     * @View(serializerGroups={"Default"})
     */
    public function postThemeAction(Request $request)
    {
        return $this->formTheme(new Theme(), $request, "post");
    }

    /**
     * @View(serializerGroups={"Default"})
     */
    public function patchThemesAction(Request $request, $slug)
    {
        $theme = $this->getEntity($slug, Access::EDIT);

        return $this->formTheme($theme, $request, "patch");
    }

    public function deleteThemeAction($slug)
    {
        $theme = $this->getEntity($slug, Access::DELETE);

        $em = $this->getDoctrine()->getManager();
        $em->remove($theme);
        $em->flush();

        return new JsonResponse(array(), 204);
    }

    private function formTheme(Theme $theme, Request $request, $method = "post")
    {
        $form = $this->createForm(new ThemeType(), $theme, array("method" => $method));

        $form->handleRequest($request);

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($theme);
            $em->flush();

            return $theme;
        }

        return new JsonResponse($this->getAllErrors($form), 400);
    }

    final protected function getRepositoryName()
    {
        return "LKERemarkBundle:Theme";
    }
}

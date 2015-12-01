<?php

namespace LKE\AdminBundle\Controller;

use LKE\RemarkBundle\Entity\Theme;
use LKE\RemarkBundle\Form\ThemeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations\View;

class ThemeController extends Controller
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
        $theme = $this->get("lke_remark.get_theme")->getTheme($slug);

        return $this->formTheme($theme, $request, "patch");
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

        return new JsonResponse(array(), 400); // TODO Error message
    }
}

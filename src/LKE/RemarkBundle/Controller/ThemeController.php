<?php

namespace LKE\RemarkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;

class ThemeController extends Controller
{
    /**
     * @View(serializerGroups={"Default"})
     */
    public function getThemesAction(Request $request)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 20);

        $themes = $this->getRepository()->getThemes($limit, $page - 1);

        return $themes;
    }

    /**
     * @View(serializerGroups={"Default"})
     */
    public function getThemeAction($slug)
    {
        return $this->getTheme($slug);
    }

    private function getTheme($slug)
    {
        $theme = $this->getRepository()->findBySlug($slug);

        if (null === $theme) {
            throw $this->createNotFoundException();
        }

        return $theme;
    }

    private function getRepository()
    {
        return $this->getDoctrine()->getRepository("LKERemarkBundle:Theme");
    }
}

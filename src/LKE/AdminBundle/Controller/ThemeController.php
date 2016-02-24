<?php

namespace LKE\AdminBundle\Controller;

use LKE\RemarkBundle\Entity\Theme;
use LKE\RemarkBundle\Form\Type\ThemeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use LKE\CoreBundle\Security\Voter;
use LKE\CoreBundle\Controller\CoreController;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ThemeController extends CoreController
{
    /**
     * @View(serializerGroups={"Default"})
     * @ApiDoc(
     *  section="Admin themes",
     *  description="Add a theme",
     *  input="LKE\RemarkBundle\Form\Type\ThemeType",
     *  output={
     *      "class"="LKE\RemarkBundle\Entity\Theme",
     *      "groups"={"Default"}
     *  }
     * )
     */
    public function postThemeAction(Request $request)
    {
        return $this->formTheme(new Theme(), $request, "post");
    }

    /**
     * @View(serializerGroups={"Default"})
     * @param string $slug slug of the theme
     * @ApiDoc(
     *  section="Admin themes",
     *  description="Edit a theme",
     *  input="LKE\RemarkBundle\Form\Type\ThemeType",
     *  output={
     *      "class"="LKE\RemarkBundle\Entity\Theme",
     *      "groups"={"Default"}
     *  }
     * )
     */
    public function patchThemesAction(Request $request, $slug)
    {
        $theme = $this->getEntity($slug, Voter::EDIT, ["method" => "findBySlug"]);

        return $this->formTheme($theme, $request, "patch");
    }

    /**
     * @param string $slug slug of the theme
     * @ApiDoc(
     *  section="Admin themes",
     *  description="Delete a theme"
     * )
     *
     * @return JsonResponse
     */
    public function deleteThemeAction($slug)
    {
        $theme = $this->getEntity($slug, Voter::DELETE, ["method" => "findBySlug"]);

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

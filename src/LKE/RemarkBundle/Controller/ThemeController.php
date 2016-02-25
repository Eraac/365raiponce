<?php

namespace LKE\RemarkBundle\Controller;

use LKE\CoreBundle\Controller\CoreController;
use LKE\CoreBundle\Security\Voter;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ThemeController extends CoreController
{
    /**
     * @View(serializerGroups={"Default"})
     * @ApiDoc(
     *  section="Themes",
     *  description="Get list of themes",
     *  parameters={
     *      {"name"="limit", "dataType"="integer", "required"=false, "description"="Number max of results"},
     *      {"name"="page", "dataType"="integer", "required"=false, "description"="Page number"},
     *  }
     * )
     */
    public function getThemesAction(Request $request)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 20);

        $themes = $this->getRepository()->getThemes($limit, $page - 1);

        return $themes;
    }

    /**
     * @View(serializerGroups={"Default"})
     * @param string $slug slug of the theme
     * @ApiDoc(
     *  section="Themes",
     *  description="Get one theme",
     *  output={
     *      "class"="LKE\RemarkBundle\Entity\Theme",
     *      "groups"={"Default"}
     *  }
     * )
     */
    public function getThemeAction($slug)
    {
        return $this->getEntity($slug, Voter::VIEW, ["method" => "findBySlug"]);
    }

    final protected function getRepositoryName()
    {
        return "LKERemarkBundle:Theme";
    }
}

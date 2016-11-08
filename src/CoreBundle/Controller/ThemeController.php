<?php

namespace CoreBundle\Controller;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Docs\ThemeDocs;
use CoreBundle\Entity\Theme;
use CoreBundle\Form\ThemeType;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Hateoas\Representation\PaginatedRepresentation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ThemeController
 *
 * @package CoreBundle\Controller
 *
 * @FOSRest\Version("1.0")
 */
class ThemeController extends AbstractApiController implements ThemeDocs
{
    /**
     * Return collection of Theme
     *
     * @ApiDoc(ThemeDocs::CGET)
     *
     * @param Request $request
     *
     * @FOSRest\View(serializerGroups={"Default"})
     *
     * @return PaginatedRepresentation
     */
    public function cgetAction(Request $request) : PaginatedRepresentation
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:Theme')->qbFindAll();
        $qb = $this->applyFilter('core.theme_filter', $qb, $request);

        return $this->paginate($qb, $request);
    }

    /**
     * Return the Theme
     *
     * @ApiDoc(ThemeDocs::GET)
     *
     * @param Theme $theme
     *
     * @Security("is_granted('view', theme)")
     *
     * @FOSRest\Get("/themes/{theme_id}", requirements={"theme_id"="\d+"})
     * @FOSRest\View()
     *
     * @ParamConverter("theme", class="CoreBundle:Theme", options={"id" = "theme_id"})
     *
     * @return Theme
     */
    public function getAction(Theme $theme) : Theme
    {
        return $theme;
    }

    /**
     * Add an Theme
     *
     * @ApiDoc(ThemeDocs::POST)
     *
     * @param Request $request
     *
     * @return object|\Symfony\Component\HttpFoundation\JsonResponse
     *
     * @Security("is_granted('ROLE_ADMIN')")
     *
     * @FOSRest\View(statusCode=JsonResponse::HTTP_CREATED)
     */
    public function postAction(Request $request)
    {
        $theme = new Theme();

        return $this->form($request, ThemeType::class, $theme, ['method' => Request::METHOD_POST]);
    }

    /**
     * Update an Theme
     *
     * @ApiDoc(ThemeDocs::PATCH)
     *
     * @param Request $request
     * @param Theme   $theme
     *
     * @return object|\Symfony\Component\HttpFoundation\JsonResponse
     *
     * @Security("is_granted('edit', theme)")
     *
     * @ParamConverter("theme", class="CoreBundle:Theme", options={"id" = "theme_id"})
     *
     * @FOSRest\Patch("/themes/{theme_id}", requirements={"theme_id"="\d+"})
     * @FOSRest\View()
     */
    public function patchAction(Request $request, Theme $theme)
    {
        return $this->form($request, ThemeType::class, $theme, ['method' => Request::METHOD_PATCH]);
    }

    /**
     * Delete an Theme
     *
     * @ApiDoc(ThemeDocs::DELETE)
     *
     * @param Theme $theme
     *
     * @Security("is_granted('delete', theme)")
     *
     * @ParamConverter("theme", class="CoreBundle:Theme", options={"id" = "theme_id"})
     *
     * @FOSRest\Delete("/themes/{theme_id}", requirements={"theme_id"="\d+"})
     * @FOSRest\View()
     */
    public function deleteAction(Theme $theme)
    {
        $em = $this->getManager();

        $em->remove($theme);
        $em->flush();
    }
}

<?php

namespace CoreBundle\Controller;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Docs\NewsDocs;
use CoreBundle\Entity\News;
use CoreBundle\Form\NewsType;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Hateoas\Representation\PaginatedRepresentation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class NewsController
 *
 * @package CoreBundle\Controller
 *
 * @FOSRest\Version("1.0")
 */
class NewsController extends AbstractApiController implements NewsDocs
{
    /**
     * Return collection of News
     *
     * @ApiDoc(NewsDocs::CGET)
     *
     * @param Request $request
     *
     * @FOSRest\View(serializerGroups={"Default"})
     *
     * @Security("is_granted('ROLE_ADMIN')")
     *
     * @return PaginatedRepresentation
     */
    public function cgetAction(Request $request) : PaginatedRepresentation
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:News')->qbFindAll();
        $qb = $this->applyFilter('core.news_filter', $qb, $request);

        return $this->paginate($qb, $request);
    }

    /**
     * Return collection of current News
     *
     * @ApiDoc(NewsDocs::CGET_CURRENT)
     *
     * @param Request $request
     *
     * @FOSRest\View(serializerGroups={"Default"})
     *
     * @return PaginatedRepresentation
     */
    public function getCurrentAction(Request $request) : PaginatedRepresentation
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:News')->qbFindAllCurrent();

        return $this->paginate($qb, $request);
    }

    /**
     * Return the News
     *
     * @ApiDoc(NewsDocs::GET)
     *
     * @param News $news
     *
     * @Security("is_granted('view', news)")
     *
     * @FOSRest\Get("/news/{news_id}", requirements={"news_id"="\d+"})
     * @FOSRest\View()
     *
     * @ParamConverter("news", class="CoreBundle:News", options={"id" = "news_id"})
     *
     * @return News
     */
    public function getAction(News $news) : News
    {
        return $news;
    }

    /**
     * Add an News
     *
     * @ApiDoc(NewsDocs::POST)
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
        $news = new News();

        return $this->form($request, NewsType::class, $news, ['method' => Request::METHOD_POST]);
    }

    /**
     * Update an News
     *
     * @ApiDoc(NewsDocs::PATCH)
     *
     * @param Request $request
     * @param News    $news
     *
     * @return object|\Symfony\Component\HttpFoundation\JsonResponse
     *
     * @Security("is_granted('edit', news)")
     *
     * @ParamConverter("news", class="CoreBundle:News", options={"id" = "news_id"})
     *
     * @FOSRest\Patch("/news/{news_id}", requirements={"news_id"="\d+"})
     * @FOSRest\View()
     */
    public function patchAction(Request $request, News $news)
    {
        return $this->form($request, NewsType::class, $news, ['method' => Request::METHOD_PATCH]);
    }

    /**
     * Delete an News
     *
     * @ApiDoc(NewsDocs::DELETE)
     *
     * @param News $news
     *
     * @Security("is_granted('delete', news)")
     *
     * @ParamConverter("news", class="CoreBundle:News", options={"id" = "news_id"})
     *
     * @FOSRest\Delete("/news/{news_id}", requirements={"news_id"="\d+"})
     * @FOSRest\View()
     */
    public function deleteAction(News $news)
    {
        $em = $this->getManager();

        $em->remove($news);
        $em->flush();
    }
}

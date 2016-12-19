<?php

namespace CoreBundle\Controller\Stats;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Controller\AbstractApiController;
use CoreBundle\Docs\StatsDocs;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class StatsController
 *
 * @package CoreBundle\Controller
 *
 * @FOSRest\Version("1.0")
 */
class StatsController extends AbstractApiController implements StatsDocs
{
    /**
     * Get stats about remark of the application
     *
     * @param Request $request
     *
     * @ApiDoc(StatsDocs::GET_REMARKS)
     *
     * @return JsonResponse
     *
     * @FOSRest\View()
     */
    public function getRemarksAction(Request $request) : JsonResponse
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:Remark')->count('r');
        $qb = $this->applyFilter('core.stats.remark_filter', $qb, $request);

        return new JsonResponse($qb->getQuery()->getArrayResult());
    }

    /**
     * Get stats about response of the application
     *
     * @param Request $request
     *
     * @ApiDoc(StatsDocs::GET_RESPONSES)
     *
     * @return JsonResponse
     *
     * @FOSRest\View()
     */
    public function getResponsesAction(Request $request) : JsonResponse
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:Response')->count('r');
        $qb = $this->applyFilter('core.stats.response_filter', $qb, $request);

        return new JsonResponse($qb->getQuery()->getArrayResult());
    }

    /**
     * Get stats about users of the application
     *
     * @param Request $request
     *
     * @ApiDoc(StatsDocs::GET_USERS)
     *
     * @return JsonResponse
     *
     * @FOSRest\View()
     */
    public function getUsersAction(Request $request) : JsonResponse
    {
        $qb = $this->getDoctrine()->getRepository('UserBundle:User')->count('u');
        $qb = $this->applyFilter('user.stats.user_filter', $qb, $request);

        return new JsonResponse($qb->getQuery()->getArrayResult());
    }

    /**
     * Get stats about users of the application
     *
     * @param Request $request
     *
     * @ApiDoc(StatsDocs::GET_USERS)
     *
     * @return JsonResponse
     *
     * @FOSRest\View()
     */
    public function getVotesRemarksAction(Request $request) : JsonResponse
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:VoteRemark')->count('v');
        $qb = $this->applyFilter('core.stats.vote_remark_filter', $qb, $request);

        return new JsonResponse($qb->getQuery()->getArrayResult());
    }
}

<?php

namespace CoreBundle\Controller\Stats;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Controller\AbstractApiController;
use CoreBundle\Docs\StatsDocs;
use CoreBundle\Service\Paginator;
use Doctrine\ORM\QueryBuilder;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class StatsController
 *
 * @package CoreBundle\Controller
 *
 * @FOSRest\Version(AbstractApiController::ALL_API_VERSIONS)
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
     * @return array
     *
     * @FOSRest\View()
     */
    public function getRemarksAction(Request $request) : array
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:Remark')->count('r');
        $qb = $this->applyFilter('core.stats.remark_filter', $qb, $request);

        return $this->paginateStats($qb, $request);
    }

    /**
     * Get stats about response of the application
     *
     * @param Request $request
     *
     * @ApiDoc(StatsDocs::GET_RESPONSES)
     *
     * @return array
     *
     * @FOSRest\View()
     */
    public function getResponsesAction(Request $request) : array
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:Response')->count('r');
        $qb = $this->applyFilter('core.stats.response_filter', $qb, $request);

        return $this->paginateStats($qb, $request);
    }

    /**
     * Get stats about users of the application
     *
     * @param Request $request
     *
     * @ApiDoc(StatsDocs::GET_USERS)
     *
     * @return array
     *
     * @FOSRest\View()
     */
    public function getUsersAction(Request $request) : array
    {
        $qb = $this->getDoctrine()->getRepository('UserBundle:User')->count('u');
        $qb = $this->applyFilter('user.stats.user_filter', $qb, $request);

        return $this->paginateStats($qb, $request);
    }

    /**
     * Get stats about votes on remark of the application
     *
     * @param Request $request
     *
     * @ApiDoc(StatsDocs::GET_VOTE_REMARKS)
     *
     * @return array
     *
     * @FOSRest\View()
     */
    public function getVotesRemarksAction(Request $request) : array
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:VoteRemark')->count('v');
        $qb = $this->applyFilter('core.stats.vote_remark_filter', $qb, $request);

        return $this->paginateStats($qb, $request);
    }

    /**
     * Get stats about votes on response of the application
     *
     * @param Request $request
     *
     * @ApiDoc(StatsDocs::GET_VOTE_RESPONSES)
     *
     * @return array
     *
     * @FOSRest\View()
     */
    public function getVotesResponsesAction(Request $request) : array
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:VoteResponse')->count('v');
        $qb = $this->applyFilter('core.stats.vote_response_filter', $qb, $request);

        return $this->paginateStats($qb, $request);
    }

    /**
     * @param QueryBuilder $qb
     * @param Request $request
     *
     * @return array
     */
    private function paginateStats(QueryBuilder $qb, Request $request) : array
    {
        /** @var Paginator $paginator */
        $paginator = $this->get('core.paginator');

        return $paginator->paginateStats($qb, $request);
    }
}

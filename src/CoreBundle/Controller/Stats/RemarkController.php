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
class RemarkController extends AbstractApiController implements StatsDocs
{
    /**
     * Get stats about remark of the application
     *
     * @ApiDoc(StatsDocs::GET_REMARKS)
     *
     * @return JsonResponse
     *
     * @FOSRest\Get("/stats/remarks")
     * @FOSRest\View()
     */
    public function getStatsAction(Request $request)
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:Remark')->count('r');
        $qb = $this->applyFilter('core.stats.remark_filter', $qb, $request);

        return new JsonResponse($qb->getQuery()->getArrayResult());
    }
}

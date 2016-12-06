<?php

namespace CoreBundle\Controller;

use CoreBundle\Annotation\ApiDoc;
//use CoreBundle\Docs\StatsDocs;
use CoreBundle\Service\RetrieveStats;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class StatsController
 *
 * @package CoreBundle\Controller
 *
 * @FOSRest\Version("1.0")
 */
class StatsController extends AbstractApiController// implements StatsDocs
{
    /**
     * Get stats of the application
     *
     * ApiDoc(StatsDocs::GET)
     *
     * @return JsonResponse
     *
     * @FOSRest\View()
     */
    public function getAction()
    {
        /** @var RetrieveStats $retrieveStats */
        $retrieveStats = $this->get('core.retrieve_stats');

        return new JsonResponse($retrieveStats->stats());
    }
}

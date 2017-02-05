<?php

namespace CoreBundle\Controller;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Docs\HistoryDocs;
use CoreBundle\Entity\History;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Hateoas\Representation\PaginatedRepresentation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class HistoryController
 *
 * @package CoreBundle\Controller
 *
 * @FOSRest\Version(AbstractApiController::ALL_API_VERSIONS)
 */
class HistoryController extends AbstractApiController implements HistoryDocs
{
    /**
     * Return collection of History
     *
     * @ApiDoc(HistoryDocs::CGET)
     *
     * @param Request $request
     *
     * @FOSRest\Get("/histories")
     * @FOSRest\View(serializerGroups={"Default"})
     *
     * @return PaginatedRepresentation
     *
     * @Security("is_granted('ROLE_ADMIN')")
     */
    public function cgetAction(Request $request) : PaginatedRepresentation
    {
        $qb = $this->getRepository('CoreBundle:History')->qbFindAll();
        $qb = $this->applyFilter('core.history_filter', $qb, $request);

        return $this->paginate($qb, $request);
    }

    /**
     * Return the History
     *
     * @ApiDoc(HistoryDocs::GET)
     *
     * @param History $history
     *
     * @Security("is_granted('view', history)")
     *
     * @FOSRest\Get("/histories/{history_id}", requirements={"history_id"="\d+"})
     * @FOSRest\View(serializerGroups={"Default"})
     *
     * @ParamConverter("history", class="CoreBundle:History", options={"id" = "history_id"})
     *
     * @return History
     */
    public function getAction(History $history) : History
    {
        return $history;
    }
}

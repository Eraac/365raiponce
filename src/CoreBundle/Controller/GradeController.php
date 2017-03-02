<?php

namespace CoreBundle\Controller;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Docs\GradeDocs;
use CoreBundle\Entity\Grade;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Hateoas\Representation\PaginatedRepresentation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class GradeController
 *
 * @package CoreBundle\Controller
 *
 * @FOSRest\Version(AbstractApiController::ALL_API_VERSIONS)
 */
class GradeController extends AbstractApiController implements GradeDocs
{
    /**
     * Return collection of Grade
     *
     * @ApiDoc(GradeDocs::CGET)
     *
     * @param Request $request
     *
     * @FOSRest\View(serializerGroups={"Default"})
     *
     * @return PaginatedRepresentation
     */
    public function cgetAction(Request $request) : PaginatedRepresentation
    {
        $qb = $this->getRepository('CoreBundle:Grade')->qbFindAll();
        $qb = $this->applyFilter('core.grade_filter', $qb, $request);

        return $this->paginate($qb, $request);
    }

    /**
     * Return the Grade
     *
     * @ApiDoc(GradeDocs::GET)
     *
     * @param Grade $grade
     *
     * @Security("is_granted('view', grade)")
     *
     * @FOSRest\Get("/grades/{grade_id}", requirements={"grade_id"="\d+"})
     * @FOSRest\View()
     *
     * @ParamConverter("grade", class="CoreBundle:Grade", options={"id" = "grade_id"})
     *
     * @return Grade
     */
    public function getAction(Grade $grade) : Grade
    {
        return $grade;
    }
}

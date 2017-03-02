<?php

namespace CoreBundle\Controller;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Docs\ActionDocs;
use CoreBundle\Entity\Action;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Class ActionController
 *
 * @package CoreBundle\Controller
 *
 * @FOSRest\Version(AbstractApiController::ALL_API_VERSIONS)
 */
class ActionController extends AbstractApiController implements ActionDocs
{
    /**
     * Return the Action
     *
     * @ApiDoc(ActionDocs::GET)
     *
     * @param Action $action
     *
     * @Security("is_granted('view', action)")
     *
     * @FOSRest\Get("/actions/{action_id}", requirements={"action_id"="\d+"})
     * @FOSRest\View()
     *
     * @ParamConverter("action", class="CoreBundle:Action", options={"id" = "action_id"})
     *
     * @return Action
     */
    public function getAction(Action $action) : Action
    {
        return $action;
    }
}

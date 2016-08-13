<?php

namespace LKE\RemarkBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use LKE\CoreBundle\Controller\CoreController;
use LKE\CoreBundle\Security\Voter;
use LKE\RemarkBundle\Entity\Remark;
use LKE\VoteBundle\Entity\VoteRemark;

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
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 50);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $this->getRepository()->queryThemes(),
            $page,
            $limit
        );

        $themes = $pagination->getItems();

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

    /**
     * @View(serializerGroups={"Default", "stats"})
     * @ApiDoc(
     *  section="Remarks",
     *  description="Get list of remarks by theme",
     *  parameters={
     *      {"name"="limit", "dataType"="integer", "required"=false, "description"="Number max of results"},
     *      {"name"="page", "dataType"="integer", "required"=false, "description"="Page number"},
     *  }
     * )
     */
    public function getThemeRemarksAction(Request $request, $slug)
    {
        $theme = $this->getEntity($slug, Voter::VIEW, ["method" => "findBySlug"]);

        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 20);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $this->getRepository('LKERemarkBundle:Remark')->queryPostedRemarkByTheme($theme),
            $page,
            $limit
        );

        $remarks = $pagination->getItems();

        $this->setStats($remarks);

        return $remarks;
    }

    final protected function getRepositoryName()
    {
        return "LKERemarkBundle:Theme";
    }

    private function setStats($remarks)
    {
        foreach ($remarks as $remark) {
            $this->setStatsOne($remark);
        }
    }

    private function setStatsOne(Remark $remark)
    {
        $repo = $this->getRepository('LKERemarkBundle:Remark');
        $user = $this->getUser();

        $userHasVoteForIsSexist = $repo->userHasVote($remark, $user, VoteRemark::IS_SEXIST);
        $userHasVoteForAlreadyLived = $repo->userHasVote($remark, $user, VoteRemark::ALREADY_LIVED);

        $remark->setUserHasVoteForIsSexist($userHasVoteForIsSexist)
            ->setUserHasVoteForAlreadyLived($userHasVoteForAlreadyLived);
    }
}

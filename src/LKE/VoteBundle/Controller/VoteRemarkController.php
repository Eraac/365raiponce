<?php

namespace LKE\VoteBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use LKE\CoreBundle\Controller\CoreController;
use LKE\CoreBundle\Security\Voter;
use LKE\VoteBundle\Entity\VoteRemark;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class VoteRemarkController extends CoreController
{
    /**
     * @View(serializerGroups={"my-vote"})
     * @Security("is_granted('IS_AUTHENTICATED_REMEMBERED')")
     * @param integer $id id of the remark
     * @ApiDoc(
     *  section="Votes",
     *  description="Vote for a remark",
     *  parameters={
     *      {"name"="type", "dataType"="integer", "required"=true, "description"="0. c'est du sexisme, 1. j'ai déjà vécu ça"}
     *  },
     *  output={
     *      "class"="LKE\VoteBundle\Entity\VoteRemark",
     *      "groups"={"my-vote"}
     *  }
     * )
     */
    public function postRemarkVotesAction(Request $request, $id)
    {
        $remark = $this->getEntity($id, Voter::VIEW, ["repository" => "LKERemarkBundle:Remark"]);
        $type = $this->getType($request);
        $user = $this->getUser();

        $canVote = $this->get("lke_vote.can_vote")->canVoteForRemark($remark, $user, $type);

        if (!$canVote) {
            throw new AccessDeniedException(); // TODO Say why
        }

        $vote = new VoteRemark();
        $vote->setRemark($remark)
                ->setUser($user)
                ->setType($type);

        $em = $this->getDoctrine()->getManager();
        $em->persist($vote);
        $em->flush();

        return $vote;
    }

    /**
     * @Security("is_granted('IS_AUTHENTICATED_REMEMBERED')")
     * @param integer $id id of the remark
     * @ApiDoc(
     *  section="Votes",
     *  description="Delete vote for remark",
     * )
     */
    public function deleteRemarkVotesAction(Request $request, $id)
    {
        $remark = $this->getEntity($id, Voter::VIEW, ["repository" => "LKERemarkBundle:Remark"]);
        $type = $this->getType($request);

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository($this->getRepositoryName());
        $vote = $repo->getVoteByUserAndRemark($remark, $this->getUser(), $type);

        $em->remove($vote);
        $em->flush();

        return new JsonResponse(array(), 204);
    }

    private function getType(Request $request)
    {
        return $request->request->getInt("type", VoteRemark::UNKNOWN);
    }

    final protected function getRepositoryName()
    {
        return "LKEVoteBundle:VoteRemark";
    }
}

<?php

namespace LKE\VoteBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\JsonResponse;
use LKE\CoreBundle\Controller\CoreController;
use LKE\CoreBundle\Security\Voter;
use LKE\VoteBundle\Entity\Vote;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class VoteController extends CoreController
{
    /**
     * @View(serializerGroups={"my-vote"})
     * @Security("is_granted('IS_AUTHENTICATED_REMEMBERED')")
     * @param integer $id id of the response
     * @ApiDoc(
     *  section="Votes",
     *  description="Vote for a response",
     *  output={
     *      "class"="LKE\VoteBundle\Entity\Vote",
     *      "groups"={"my-vote"}
     *  }
     * )
     */
    public function postResponseVotesAction($id)
    {
        $response = $this->getEntity($id, Voter::VIEW, ["repository" => "LKERemarkBundle:Response"]);
        $user = $this->getUser();

        $canVote = $this->get("lke_vote.can_vote")->canVote($response, $user);

        if (!$canVote) {
            throw new AccessDeniedException(); // TODO Say why
        }

        $vote = new Vote();
        $vote->setResponse($response)->setUser($user);

        $em = $this->getDoctrine()->getManager();
        $em->persist($vote);
        $em->flush();

        return $vote;
    }

    /**
     * @Security("is_granted('IS_AUTHENTICATED_REMEMBERED')")
     * @param integer $id id of the response
     * @ApiDoc(
     *  section="Votes",
     *  description="Delete vote",
     * )
     */
    public function deleteResponseVotesAction($id)
    {
        $response = $this->getEntity($id, Voter::VIEW, ["repository" => "LKERemarkBundle:Response"]);

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository($this->getRepositoryName());
        $vote = $repo->getVoteByUserAndResponse($response, $this->getUser());

        $em->remove($vote);
        $em->flush();

        return new JsonResponse(array(), 204);
    }

    final protected function getRepositoryName()
    {
        return "LKEVoteBundle:Vote";
    }
}

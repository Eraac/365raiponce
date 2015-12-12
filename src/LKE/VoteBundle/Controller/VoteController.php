<?php

namespace LKE\VoteBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\JsonResponse;
use LKE\CoreBundle\Controller\CoreController;
use LKE\UserBundle\Service\Access;
use LKE\VoteBundle\Entity\Vote;

class VoteController extends CoreController
{
    /**
     * @View(serializerGroups={"my-vote"})
     * @Security("is_granted('IS_AUTHENTICATED_REMEMBERED')")
     */
    public function postResponseVotesAction($id)
    {
        $response = $this->getEntity($id, Access::READ, "LKERemarkBundle:Response");
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
     */
    public function deleteResponseVotesAction($id)
    {
        $response = $this->getEntity($id, Access::READ, "LKERemarkBundle:Response");

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

<?php

namespace CoreBundle\Controller\Response;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Controller\AbstractApiController;
use CoreBundle\Docs\VoteDocs;
use CoreBundle\Entity\Response;
use CoreBundle\Entity\VoteResponse;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class VoteController
 *
 * @package CoreBundle\Controller\Response
 *
 * @FOSRest\Version("1.0")
 */
class VoteController extends AbstractApiController implements VoteDocs
{
    /**
     * Add a vote to a response
     *
     * @param Response $response
     *
     * @return JsonResponse|null
     *
     * @ApiDoc(VoteDocs::VOTE_RESPONSE)
     *
     * @Security("is_granted('vote', response)")
     *
     * @FOSRest\Post("/responses/{response_id}/votes", requirements={"response_id"="\d+"})
     * @FOSRest\View()
     *
     * @ParamConverter("response", class="CoreBundle:Response", options={"id" = "response_id"})
     */
    public function postResponsesAction(Response $response)
    {
        $vote = new VoteResponse();
        $vote
            ->setResponse($response)
            ->setUser($this->getUser())
        ;

        /** @var ValidatorInterface $validator */
        $validator = $this->get('validator');
        $errors = $validator->validate($vote);

        if ($errors->count() > 0) {
            return $this->createRawJsonError($this->errorsToArray($errors), JsonResponse::HTTP_CONFLICT);
        }

        $em = $this->getManager();
        $em->persist($vote);
        $em->flush();
    }

    /**
     * Remove vote to a response
     *
     * @param Response $response
     *
     * @return NotFoundHttpException|null
     *
     * @ApiDoc(VoteDocs::UNVOTE_RESPONSE)
     *
     * @Security("is_granted('unvote', response)")
     *
     * @FOSRest\Delete("/responses/{response_id}/votes", requirements={"response_id"="\d+"})
     * @FOSRest\View()
     *
     * @ParamConverter("response", class="CoreBundle:Response", options={"id" = "response_id"})
     */
    public function deleteResponsesAction(Response $response)
    {
        $vote = $this->getRepository('CoreBundle:VoteResponse')->findOneBy(['user' => $this->getUser(), 'response' => $response]);

        if (is_null($vote)) {
            throw $this->createNotFoundException();
        }

        $em = $this->getManager();
        $em->remove($vote);
        $em->flush();
    }

    /**
     * @param ConstraintViolationListInterface $constraintViolationList
     *
     * @return array
     */
    private function errorsToArray(ConstraintViolationListInterface $constraintViolationList) : array
    {
        $errors = [];

        foreach ($constraintViolationList as $error) {
            $errors[] = $error->getMessage();
        }

        return $errors;
    }
}

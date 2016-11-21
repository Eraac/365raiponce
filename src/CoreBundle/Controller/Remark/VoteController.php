<?php

namespace CoreBundle\Controller\Remark;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Controller\AbstractApiController;
use CoreBundle\Docs\VoteDocs;
use CoreBundle\Entity\Remark;
use CoreBundle\Entity\VoteRemark;
use CoreBundle\Form\VoteRemarkType;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * Add a vote to a remark
     *
     * @param Request $request
     * @param Remark $remark
     *
     * @return JsonResponse|null
     *
     * @ApiDoc(VoteDocs::VOTE_REMARK)
     *
     * @Security("is_granted('vote', remark)")
     *
     * @FOSRest\Post("/remarks/{remark_id}/votes", requirements={"remark_id"="\d+"})
     * @FOSRest\View(statusCode=JsonResponse::HTTP_CREATED)
     *
     * @ParamConverter("remark", class="CoreBundle:Remark", options={"id" = "remark_id"})
     */
    public function postRemarkAction(Request $request, Remark $remark)
    {
        $vote = new VoteRemark();
        $vote
            ->setRemark($remark)
            ->setUser($this->getUser())
        ;

        return $this->form($request, VoteRemarkType::class, $vote, ['method' => Request::METHOD_POST]);
    }

    /**
     * Remove a vote to a remark
     *
     * @param Request $request
     * @param Remark  $remark
     *
     * @return JsonResponse
     * @throws NotFoundHttpException
     *
     * @ApiDoc(VoteDocs::UNVOTE_REMARK)
     *
     * @Security("is_granted('unvote', remark)")
     *
     * @FOSRest\Delete("/remarks/{remark_id}/votes", requirements={"remark_id"="\d+"})
     * @FOSRest\View()
     *
     * @ParamConverter("remark", class="CoreBundle:Remark", options={"id" = "remark_id"})
     */
    public function deleteRemarkAction(Request $request, Remark $remark)
    {
        $type = $request->request->getInt('type', -1);

        if (!in_array($type, VoteRemark::TYPES)) {
            return $this->createJsonError('core.error.invalid_type_vote', JsonResponse::HTTP_BAD_REQUEST);
        }

        $vote = $this->getRepository('CoreBundle:VoteRemark')->findOneBy([
            'remark' => $remark, 'user' => $this->getUser(), 'type' => $type
        ]);

        if (is_null($vote)) {
            throw $this->createNotFoundException();
        }

        $em = $this->getManager();
        $em->remove($vote);
        $em->flush();
    }

    /**
     * @inheritdoc
     */
    protected function formSuccess($entity)
    {
        $this->persistEntity($entity);

        // No return
    }
}

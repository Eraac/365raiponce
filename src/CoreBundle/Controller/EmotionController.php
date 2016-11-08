<?php

namespace CoreBundle\Controller;

use CoreBundle\Entity\Emotion;
use CoreBundle\Form\EmotionType;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use Hateoas\Representation\PaginatedRepresentation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class EmotionController
 *
 * @package CoreBundle\Controller
 *
 * @FOSRest\Version("1.0")
 */
class EmotionController extends AbstractApiController
{
    /**
     * Return collection of Emotion
     *
     * @param Request $request
     *
     * @FOSRest\View(serializerGroups={"Default"})
     *
     * @return PaginatedRepresentation
     */
    public function cgetAction(Request $request) : PaginatedRepresentation
    {
        $qb = $this->getDoctrine()->getRepository('CoreBundle:Emotion')->qbFindAll();
        $qb = $this->applyFilter('core.log_request_filter', $qb, $request);

        return $this->paginate($qb, $request);
    }

    /**
     * Return the Emotion
     *
     * @Security("is_granted('view', emotion)")
     *
     * @FOSRest\Get("/emotions/{emotion_id}")
     * @FOSRest\View()
     *
     * @ParamConverter("emotion", class="CoreBundle:Emotion", options={"id" = "emotion_id"})
     *
     * @return Emotion
     */
    public function getAction(Emotion $emotion) : Emotion
    {
        return $emotion;
    }

    /**
     * Add an Emotion
     *
     * @param Request $request
     *
     * @return object|\Symfony\Component\HttpFoundation\JsonResponse
     *
     * @Security("is_granted('ROLE_ADMIN')")
     *
     * @FOSRest\View(statusCode=JsonResponse::HTTP_CREATED)
     */
    public function postAction(Request $request)
    {
        $emotion = new Emotion();

        return $this->form($request, EmotionType::class, $emotion, ['method' => Request::METHOD_POST]);
    }

    /**
     * Update an Emotion
     *
     * @param Request $request
     *
     * @return object|\Symfony\Component\HttpFoundation\JsonResponse
     *
     * @Security("is_granted('edit', emotion)")
     *
     * @ParamConverter("emotion", class="CoreBundle:Emotion", options={"id" = "emotion_id"})
     *
     * @FOSRest\Patch("/emotions/{emotion_id}")
     * @FOSRest\View()
     */
    public function patchAction(Request $request, Emotion $emotion)
    {
        return $this->form($request, EmotionType::class, $emotion, ['method' => Request::METHOD_PATCH]);
    }

    /**
     * Delete an Emotion
     *
     * @param Emotion $emotion
     *
     * @Security("is_granted('delete', emotion)")
     *
     * @ParamConverter("emotion", class="CoreBundle:Emotion", options={"id" = "emotion_id"})
     *
     * @FOSRest\Delete("/emotions/{emotion_id}")
     * @FOSRest\View()
     */
    public function deleteAction(Emotion $emotion)
    {
        $em = $this->getManager();

        $em->remove($emotion);
        $em->flush();
    }
}

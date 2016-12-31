<?php

namespace CoreBundle\Controller;

use CoreBundle\Annotation\ApiDoc;
use CoreBundle\Docs\EmotionDocs;
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
 * @FOSRest\Version(AbstractApiController::ALL_API_VERSIONS)
 */
class EmotionController extends AbstractApiController implements EmotionDocs
{
    /**
     * Return collection of Emotion
     *
     * @ApiDoc(EmotionDocs::CGET)
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
        $qb = $this->applyFilter('core.emotion_filter', $qb, $request);

        return $this->paginate($qb, $request);
    }

    /**
     * Return the Emotion
     *
     * @param Emotion $emotion
     *
     * @ApiDoc(EmotionDocs::GET)
     *
     * @Security("is_granted('view', emotion)")
     *
     * @FOSRest\Get("/emotions/{emotion_id}", requirements={"emotion_id"="\d+"})
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
     * @ApiDoc(EmotionDocs::POST)
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
     * @ApiDoc(EmotionDocs::PATCH)
     *
     * @param Request $request
     * @param Emotion $emotion
     *
     * @return object|\Symfony\Component\HttpFoundation\JsonResponse
     *
     * @Security("is_granted('edit', emotion)")
     *
     * @ParamConverter("emotion", class="CoreBundle:Emotion", options={"id" = "emotion_id"})
     *
     * @FOSRest\Patch("/emotions/{emotion_id}", requirements={"emotion_id"="\d+"})
     * @FOSRest\View()
     */
    public function patchAction(Request $request, Emotion $emotion)
    {
        return $this->form($request, EmotionType::class, $emotion, ['method' => Request::METHOD_PATCH]);
    }

    /**
     * Delete an Emotion
     *
     * @ApiDoc(EmotionDocs::DELETE)
     *
     * @param Emotion $emotion
     *
     * @Security("is_granted('delete', emotion)")
     *
     * @ParamConverter("emotion", class="CoreBundle:Emotion", options={"id" = "emotion_id"})
     *
     * @FOSRest\Delete("/emotions/{emotion_id}", requirements={"emotion_id"="\d+"})
     * @FOSRest\View()
     */
    public function deleteAction(Emotion $emotion)
    {
        $em = $this->getManager();

        $em->remove($emotion);
        $em->flush();
    }
}

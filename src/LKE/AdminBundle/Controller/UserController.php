<?php

namespace LKE\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use LKE\CoreBundle\Security\Voter;
use LKE\CoreBundle\Controller\CoreController;
use FOS\RestBundle\Controller\Annotations\Post;

class UserController extends CoreController
{
    /**
     * @Post("users/{id}/certify")
     */
    public function postUserCertifyAction($id)
    {
        return $this->certifyUser($id, true);
    }

    /**
     * @Post("users/{id}/decertify")
     */
    public function postUserDecertifyAction($id)
    {
        return $this->certifyUser($id, false);
    }

    private function certifyUser($idUser, $certify)
    {
        $user = $this->getEntity($idUser, Voter::EDIT);

        $user->setCertificated($certify);

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return new JsonResponse([]);
    }

    final protected function getRepositoryName()
    {
        return "LKEUserBundle:User";
    }
}

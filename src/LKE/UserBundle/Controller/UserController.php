<?php

namespace LKE\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\View;

class UserController extends Controller
{
    /**
     * @View(serializerGroups={"Default", "details-user"})
     */
    public function getUsersAction()
    {
        $users = $this->getDoctrine()->getRepository('LKEUserBundle:User')->findAll();
        
        return $users;
    }

    /**
     * @View(serializerGroups={"Default", "details-user"})
     */
    public function getMeAction()
    {
        return $this->getUser();
    }

    /**
     * @View(serializerGroups={"Default", "details-user"})
     */
    public function patchMeAction(Request $request)
    {
        $newPassword = $request->request->get("password", null);

        if (is_null($newPassword)) {
            return new JsonResponse(["error" => "new password can not be null"], 400);
        }

        $user = $this->getUser();
        $user->setPlainPassword($newPassword);

        $this->get("fos_user.user_manager")->updateUser($user, true);

        return $this->getUser();
    }
    
    /**
     * @View(serializerGroups={"Default", "details-user"})
     */
    public function getUserAction($username)
    {
        $user = $this->getDoctrine()->getRepository('LKEUserBundle:User')->findOneByUsername($username);

        if(!is_object($user)){
          throw $this->createNotFoundException();
        }
        
        return $user;
    }
}

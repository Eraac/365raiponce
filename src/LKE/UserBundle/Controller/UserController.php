<?php

namespace LKE\UserBundle\Controller;

use LKE\CoreBundle\Controller\CoreController;
use LKE\UserBundle\Entity\User;
use LKE\UserBundle\Form\Type\UserType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\UserBundle\Model\UserInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class UserController extends CoreController
{
    const SESSION_EMAIL = 'fos_user_send_resetting_email/email';

    /**
     * @View(serializerGroups={"Default", "details-user"})
     * @ApiDoc(
     *  section="Users",
     *  description="Create user",
     *  input="LKE\UserBundle\Form\Type\UserType",
     *  output={
     *      "class"="LKE\UserBundle\Entity\User",
     *      "groups"={"Default", "details-user"}
     *  }
     * )
     */
    public function postUserAction(Request $request)
    {
        $spamCheck = $this->get('sithous.antispam');

        if(!$spamCheck->setType('public_protection')->verify())
        {
            return new JsonResponse([
                'result'  => 'error',
                'message' => $spamCheck->getErrorMessage()
            ], 403);
        }

        $userManager = $this->get("fos_user.user_manager");

        return $this->formUser($userManager->createUser(), $request);
    }

    /**
     * @View(serializerGroups={"Default", "details-user"})
     * @ApiDoc(
     *  section="Users",
     *  description="List users",
     * )
     */
    public function getUsersAction(Request $request)
    {
        list($limit, $page) = $this->get('lke_core.paginator')->getBorne($request, 50);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $this->getRepository()->queryUsers(),
            $page,
            $limit
        );

        $users = $pagination->getItems();

        return $users;
    }

    /**
     * @View(serializerGroups={"Default", "details-user", "me"})
     * @ApiDoc(
     *  section="Users",
     *  description="Get current user",
     *  output={
     *      "class"="LKE\UserBundle\Entity\User",
     *      "groups"={"Default", "details-user", "me"}
     *  }
     * )
     */
    public function getMeAction()
    {
        return $this->getUser();
    }

    /**
     * @View(serializerGroups={"Default", "details-user"})
     * @ApiDoc(
     *  section="Users",
     *  description="Edit current user",
     *  requirements={{"name"="password", "dataType"="string", "required"=true, "description"="The new password"}},
     *  output={
     *      "class"="LKE\UserBundle\Entity\User",
     *      "groups"={"Default", "details-user"}
     *  }
     * )
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
     * @param string $username name of the user
     * @ApiDoc(
     *  section="Users",
     *  description="Get user profile",
     *  output={
     *      "class"="LKE\UserBundle\Entity\User",
     *      "groups"={"Default", "details-user"}
     *  }
     * )
     */
    public function getUserAction($username)
    {
        $user = $this->getDoctrine()->getRepository('LKEUserBundle:User')->findOneByUsername($username);

        if(!is_object($user)){
            throw $this->createNotFoundException();
        }

        return $user;
    }

    /**
     * @Post("/forget-password")
     * @ApiDoc(
     *  section="Users",
     *  description="Request new password",
     *  parameters={
     *      {"name"="mail", "dataType"="string", "required"=true, "description"="email account"},
     *  }
     * )
     */
    public function postForgetPasswordAction()
    {
        $email = $this->container->get('request')->request->get('email');

        /** @var $user UserInterface */
        $user = $this->container->get('fos_user.user_manager')->findUserByUsernameOrEmail($email);

        if (null === $user) {
            throw new NotFoundHttpException('Email "' . $email . '" not found');
        }

        if ($user->isPasswordRequestNonExpired($this->container->getParameter('fos_user.resetting.token_ttl'))) {
            return new JsonResponse(['error' => 'password already requested'], 400);
        }

        if (null === $user->getConfirmationToken()) {
            /** @var $tokenGenerator \FOS\UserBundle\Util\TokenGeneratorInterface */
            $tokenGenerator = $this->container->get('fos_user.util.token_generator');
            $user->setConfirmationToken($tokenGenerator->generateToken());
        }

        $this->container->get('session')->set(static::SESSION_EMAIL, $this->getObfuscatedEmail($user));
        $this->container->get('fos_user.mailer')->sendResettingEmailMessage($user);
        $user->setPasswordRequestedAt(new \DateTime());
        $this->container->get('fos_user.user_manager')->updateUser($user);

        return new JsonResponse([]);
    }

    /**
     * @Post("/reset-password/{token}")
     * @ApiDoc(
     *  section="Users",
     *  description="Reset user password",
     *  requirements={
     *      {"name"="token", "dataType"="string", "required"=true, "description"="token receive by email"},
     *  },
     *  parameters={
     *      {"name"="password", "dataType"="string", "required"=true, "description"="the new password"},
     *  }
     * )
     */
    public function postResetPasswordAction($token)
    {
        /** @var User $user */
        $user = $this->container->get('fos_user.user_manager')->findUserByConfirmationToken($token);

        if (null === $user) {
            throw new NotFoundHttpException('Token ' . $token . ' not found');
        }

        $newPassword = $this->container->get('request')->request->get('password');

        if (empty($newPassword)) {
            return new JsonResponse(['error' => 'new password can not be empty'], 400);
        }

        if (!$user->isPasswordRequestNonExpired($this->container->getParameter('fos_user.resetting.token_ttl'))) {
            return new JsonResponse(['error' => 'request expired'], 400);
        }

        $user->setPlainPassword($newPassword);
        $userManager = $this->get("fos_user.user_manager");
        $userManager->updateUser($user);

        return new JsonResponse([]);
    }

    private function formUser(User $user, Request $request)
    {
        $form = $this->createForm(new UserType(), $user);

        $form->handleRequest($request);

        if ($form->isValid())
        {
            $user->setEnabled(true);
            $userManager = $this->get("fos_user.user_manager");
            $userManager->updateUser($user);

            $this->getDoctrine()->getManager()->flush();

            return $user;
        }

        return new JsonResponse($this->getAllErrors($form), 400);
    }

    /**
     * Get the truncated email displayed when requesting the resetting.
     *
     * The default implementation only keeps the part following @ in the address.
     *
     * @param \FOS\UserBundle\Model\UserInterface $user
     *
     * @return string
     */
    protected function getObfuscatedEmail(UserInterface $user)
    {
        $email = $user->getEmail();
        if (false !== $pos = strpos($email, '@')) {
            $email = '...' . substr($email, $pos);
        }

        return $email;
    }

    final protected function getRepositoryName()
    {
        return "LKEUserBundle:User";
    }
}

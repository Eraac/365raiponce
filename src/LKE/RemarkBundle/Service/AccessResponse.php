<?php

namespace LKE\RemarkBundle\Service;

use LKE\RemarkBundle\Entity\Response;
use LKE\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

// TODO refactoring avec AccessRemark
class AccessResponse
{
    private $authorizationChecker;

    public function __construct(AuthorizationChecker $authorizationChecker)
    {
        $this->authorizationChecker = $authorizationChecker;
    }

    public function canAccess(Response $response, User $user)
    {
        return ($this->authorizationChecker->isGranted("ROLE_ADMIN") || $this->isPosted($response) || $this->isOwner($response, $user));
    }

    private function isPosted(Response $response)
    {
        return (null !== $response->getPostedAt());
    }

    private function isOwner(Response $response, User $user)
    {
        return ($user->getId() === $response->getAuthor()->getId());
    }
}
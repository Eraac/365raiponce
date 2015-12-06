<?php

namespace LKE\UserBundle\Service;

use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use LKE\UserBundle\Interfaces\Publishable;
use LKE\UserBundle\Interfaces\Ownable;

class Access
{
    private $authorizationChecker;

    public function __construct(AuthorizationChecker $authorizationChecker)
    {
        $this->authorizationChecker = $authorizationChecker;
    }

    public function canRead($entity, $user = null)
    {
        return ($this->authorizationChecker->isGranted("ROLE_ADMIN") || $this->isPublished($entity) || $this->isOwner($entity, $user));
    }

    public function canEdit($entity, $user)
    {
        return ($this->authorizationChecker->isGranted("ROLE_ADMIN") ||
               ($entity instanceof Publishable && !$entity->isPublished() && $this->isOwner($entity, $user)));
    }

    private function isPublished($entity)
    {
        return ($entity instanceof Publishable && $entity->isPublished());
    }

    private function isOwner($entity, $user)
    {
        return ($entity instanceof Ownable && $entity->getOwner() === $user);
    }
}

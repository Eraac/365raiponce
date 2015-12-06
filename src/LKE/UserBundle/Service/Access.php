<?php

namespace LKE\UserBundle\Service;

use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use LKE\UserBundle\Interfaces\Publishable;
use LKE\UserBundle\Interfaces\Ownable;
use LKE\UserBundle\Interfaces\ReadAccess;

class Access
{
    const READ = 1;
    const EDIT = 2;
    const DELETE = 3;

    private $authorizationChecker;

    public function __construct(AuthorizationChecker $authorizationChecker)
    {
        $this->authorizationChecker = $authorizationChecker;
    }

    public function canRead($entity, $user = null)
    {
        return ($this->isFullyReadable($entity) || $this->isAdmin() || $this->isPublished($entity) || $this->isOwner($entity, $user));
    }

    public function canEdit($entity, $user)
    {
        return ($this->isAdmin() || ($entity instanceof Publishable && !$entity->isPublished() && $this->isOwner($entity, $user)));
    }

    public function canDelete($entity, $user)
    {
        return ($this->isAdmin() || $this->isOwner($entity, $user));
    }

    private function isFullyReadable($entity)
    {
        return ($entity instanceof ReadAccess);
    }

    private function isAdmin()
    {
        return ($this->authorizationChecker->isGranted("ROLE_ADMIN"));
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

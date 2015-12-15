<?php

namespace LKE\UserBundle\Service;

use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use LKE\UserBundle\Interfaces\PublishableInterface;
use LKE\UserBundle\Interfaces\OwnableInterface;
use LKE\UserBundle\Interfaces\ReadAccessInterface;

class Access
{
    const VIEW = 'view';
    const EDIT = 'edit';
    const DELETE = 'delete';

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
        return ($entity instanceof ReadAccessInterface);
    }

    private function isAdmin()
    {
        return ($this->authorizationChecker->isGranted("ROLE_ADMIN"));
    }

    private function isPublished($entity)
    {
        return ($entity instanceof PublishableInterface && $entity->isPublished());
    }

    private function isOwner($entity, $user)
    {
        return ($entity instanceof OwnableInterface && $entity->getOwner() === $user);
    }
}

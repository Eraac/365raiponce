<?php

namespace LKE\RemarkBundle\Service;

use LKE\RemarkBundle\Entity\Remark;
use LKE\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

class AccessRemark
{
    private $authorizationChecker;

    public function __construct(AuthorizationChecker $authorizationChecker)
    {
        $this->authorizationChecker = $authorizationChecker;
    }

    public function canAccess(Remark $remark, $user, $isForEdit = false)
    {
        if (!$user instanceof User) {
            return false;
        }

        return  ($this->authorizationChecker->isGranted("ROLE_ADMIN")) ||
                (!$isForEdit && ($this->isPosted($remark) || $this->isOwner($remark, $user))) ||
                ($isForEdit && $this->isOwner($remark, $user) && !$this->isPosted($remark));
    }

    private function isOwner(Remark $remark, User $user)
    {
        return ($remark->getAuthor()->getId() === $user->getId());
    }

    private function isPosted(Remark $remark)
    {
        return (null !== $remark->getPostedAt());
    }
}
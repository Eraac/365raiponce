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

    public function canAccess(Remark $remark)
    {
        return ($this->authorizationChecker->isGranted("ROLE_ADMIN") || $this->isPosted($remark));
    }

    private function isPosted(Remark $remark)
    {
        return (null !== $remark->getPostedAt());
    }
}
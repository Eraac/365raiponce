<?php

namespace LKE\RemarkBundle\Security;

use LKE\CoreBundle\Security\Voter as BaseVoter;
use LKE\RemarkBundle\Entity\Response;
use LKE\UserBundle\Entity\User;

class ResponseVoter extends BaseVoter
{
    protected function supports($attribute, $subject)
    {
        return parent::supports($attribute, $subject) && $subject instanceof Response;
    }

    /**
     * @param $entity Response
     * @return bool
     */
    protected function canView($entity, $user)
    {
        return $entity->isPublished();
    }

    /**
     * @param $entity Response
     * @param $user User
     * @return bool
     */
    protected function canEdit($entity, $user)
    {
        return !$entity->isPublished() && $this->isOwner($entity->getAuthor(), $user);
    }
}

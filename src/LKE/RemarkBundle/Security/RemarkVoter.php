<?php

namespace LKE\RemarkBundle\Security;

use LKE\CoreBundle\Security\Voter as BaseVoter;
use LKE\RemarkBundle\Entity\Remark;

class RemarkVoter extends BaseVoter
{
    protected function supports($attribute, $subject)
    {
        return parent::supports($attribute, $subject) && $subject instanceof Remark;
    }

    /**
     * @param $entity Remark
     * @return bool
     */
    protected function canView($entity, $user)
    {
        return $entity->isPublished();
    }
}

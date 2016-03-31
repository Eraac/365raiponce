<?php

namespace LKE\RemarkBundle\Security;

use LKE\CoreBundle\Security\Voter as BaseVoter;
use LKE\RemarkBundle\Entity\Emotion;

class EmotionVoter extends BaseVoter
{
    protected function supports($attribute, $subject)
    {
        return parent::supports($attribute, $subject) && $subject instanceof Emotion;
    }

    protected function canView($entity, $user)
    {
        return true;
    }
}

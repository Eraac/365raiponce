<?php

namespace LKE\RemarkBundle\Security;

use LKE\CoreBundle\Security\Voter as BaseVoter;
use LKE\RemarkBundle\Entity\Theme;

class ThemeVoter extends BaseVoter
{
    protected function supports($attribute, $subject)
    {
        return parent::supports($attribute, $subject) && $subject instanceof Theme;
    }

    protected function canView($entity, $user)
    {
        return true;
    }
}

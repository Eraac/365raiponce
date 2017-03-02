<?php

namespace CoreBundle\Security;

use CoreBundle\Entity\Grade;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class GradeVoter extends AbstractVoter
{
    /**
     * @param string $attribute
     * @param mixed $subject
     *
     * @return bool
     */
    protected function supports($attribute, $subject) : bool
    {
        return self::VIEW === $attribute && $subject instanceof Grade;
    }

    /**
     * Return true is current user can view the $grade
     *
     * @param Grade $grade
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canView(Grade $grade, TokenInterface $token) : bool
    {
        return true;
    }
}

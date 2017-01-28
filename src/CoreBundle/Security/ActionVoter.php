<?php

namespace CoreBundle\Security;

use CoreBundle\Entity\Action;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class ActionVoter extends AbstractVoter
{
    /**
     * @param string $attribute
     * @param mixed $subject
     *
     * @return bool
     */
    protected function supports($attribute, $subject) : bool
    {
        return self::VIEW === $attribute && $subject instanceof Action;
    }

    /**
     * Return true is current user can view the $event
     *
     * @param Action $action
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canView(Action $action, TokenInterface $token) : bool
    {
        return true;
    }
}

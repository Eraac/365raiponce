<?php

namespace CoreBundle\Security;

use CoreBundle\Entity\History;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class HistoryVoter extends AbstractVoter
{
    /**
     * @param string $attribute
     * @param mixed $subject
     *
     * @return bool
     */
    protected function supports($attribute, $subject) : bool
    {
        return self::VIEW === $attribute && $subject instanceof History;
    }

    /**
     * Return true is current user can view the $history
     *
     * @param History $history
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canView(History $history, TokenInterface $token) : bool
    {
        return $this->isOwner($token, $history->getUser());
    }
}

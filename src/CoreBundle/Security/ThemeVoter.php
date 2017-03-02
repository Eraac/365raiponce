<?php

namespace CoreBundle\Security;

use CoreBundle\Entity\Theme;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class ThemeVoter extends AbstractVoter
{
    /**
     * @param string $attribute
     * @param mixed $subject
     *
     * @return bool
     */
    protected function supports($attribute, $subject) : bool
    {
        return parent::supports($attribute, $subject) && $subject instanceof Theme;
    }

    /**
     * Return true is current user can view the $theme
     *
     * @param Theme $theme
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canView(Theme $theme, TokenInterface $token) : bool
    {
        return true;
    }

    /**
     * Return true if current user can edit the $theme
     *
     * @param Theme $theme
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canEdit(Theme $theme, TokenInterface $token) : bool
    {
        return $this->isAdmin($token);
    }

    /**
     * Return true if current user can delete the $theme
     *
     * @param Theme $theme
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canDelete(Theme $theme, TokenInterface $token) : bool
    {
        return $this->isAdmin($token);
    }
}

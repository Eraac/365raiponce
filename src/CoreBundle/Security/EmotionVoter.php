<?php

namespace CoreBundle\Security;

use CoreBundle\Entity\Emotion;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class EmotionVoter extends AbstractVoter
{
    /**
     * @param string $attribute
     * @param mixed $subject
     *
     * @return bool
     */
    protected function supports($attribute, $subject) : bool
    {
        return parent::supports($attribute, $subject) && $subject instanceof Emotion;
    }

    /**
     * Return true is current user can view the $emotion
     *
     * @param Emotion $emotion
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canView(Emotion $emotion, TokenInterface $token) : bool
    {
        return true;
    }

    /**
     * Return true if current user can edit the $emotion
     *
     * @param Emotion $emotion
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canEdit(Emotion $emotion, TokenInterface $token) : bool
    {
        return $this->isAdmin($token);
    }

    /**
     * Return true if current user can delete the $emotion
     *
     * @param Emotion $emotion
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canDelete(Emotion $emotion, TokenInterface $token) : bool
    {
        return $this->isAdmin($token);
    }
}

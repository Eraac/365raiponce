<?php

namespace CoreBundle\Security;

use CoreBundle\Entity\Remark;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class RemarkVoter extends AbstractVoter
{
    /**
     * @param string $attribute
     * @param mixed $subject
     *
     * @return bool
     */
    protected function supports($attribute, $subject) : bool
    {
        return parent::supports($attribute, $subject) && $subject instanceof Remark;
    }

    /**
     * Return true is current user can view the $remark
     *
     * @param Remark $remark
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canView(Remark $remark, TokenInterface $token) : bool
    {
        return $remark->isPublished();
    }

    /**
     * Return true if current user can edit the $remark
     *
     * @param Remark $remark
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canEdit(Remark $remark, TokenInterface $token) : bool
    {
        return $this->isAdmin($token);
    }

    /**
     * Return true if current user can delete the $remark
     *
     * @param Remark $remark
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canDelete(Remark $remark, TokenInterface $token) : bool
    {
        return $this->isAdmin($token);
    }
}

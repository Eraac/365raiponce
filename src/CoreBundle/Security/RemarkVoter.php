<?php

namespace CoreBundle\Security;

use CoreBundle\Entity\Remark;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class RemarkVoter extends AbstractVoter
{
    const PUBLISH                   = 'publish';
    const UNPUBLISH                 = 'unpublish';
    const READ_PUBLISHED_RESPONSE   = 'viewPublishedResponses';
    const ADD_RESPONSE              = 'addResponse';
    const VOTE                      = 'vote';
    const UNVOTE                    = 'unvote';

    const ATTRIBUTES = [
        self::PUBLISH, self::UNPUBLISH, self::READ_PUBLISHED_RESPONSE,
        self::ADD_RESPONSE, self::VOTE, self::UNVOTE
    ];

    /**
     * @param string $attribute
     * @param mixed $subject
     *
     * @return bool
     */
    protected function supports($attribute, $subject) : bool
    {
        return
            (parent::supports($attribute, $subject) || in_array($attribute, self::ATTRIBUTES))
                && $subject instanceof Remark;
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

    /**
     * Return true if current user can publish the $remark
     *
     * @param Remark $remark
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canPublish(Remark $remark, TokenInterface $token) : bool
    {
        return $this->isAdmin($token);
    }

    /**
     * Return true if current user can unpublish the $remark
     *
     * @param Remark $remark
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canUnpublish(Remark $remark, TokenInterface $token) : bool
    {
        return $this->isAdmin($token);
    }

    /**
     * Return true if current user can read publish response of the $remark
     *
     * @param Remark         $remark
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canViewPublishedResponses(Remark $remark, TokenInterface $token) : bool
    {
        return $remark->isPublished();
    }

    /**
     * Return true if current user can add response to the $remark
     *
     * @param Remark         $remark
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canAddResponse(Remark $remark, TokenInterface $token) : bool
    {
        return $remark->isPublished() && $this->isConnected($token);
    }

    /**
     * Return true if current user can vote to the $remark
     *
     * @param Remark         $remark
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canVote(Remark $remark, TokenInterface $token) : bool
    {
        return $remark->isPublished() && $this->isConnected($token);
    }

    /**
     * Return true if current user can unvote to the $remark
     *
     * @param Remark         $remark
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canUnvote(Remark $remark, TokenInterface $token) : bool
    {
        return $this->canVote($remark, $token);
    }
}

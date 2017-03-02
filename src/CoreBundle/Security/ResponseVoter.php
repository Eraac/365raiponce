<?php

namespace CoreBundle\Security;

use CoreBundle\Entity\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class ResponseVoter extends AbstractVoter
{
    const PUBLISH   = 'publish';
    const UNPUBLISH = 'unpublish';
    const VOTE      = 'vote';
    const UNVOTE    = 'unvote';
    const REPORT    = 'report';

    const ATTRIBUTES = [
        self::PUBLISH, self::UNPUBLISH, self::VOTE, self::UNVOTE, self::REPORT
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
                && $subject instanceof Response;
    }

    /**
     * Return true is current user can view the $response
     *
     * @param Response $response
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canView(Response $response, TokenInterface $token) : bool
    {
        return ($response->isPublished() && $response->getRemark()->isPublished()) || $this->isOwner($token, $response->getAuthor());
    }

    /**
     * Return true if current user can edit the $response
     *
     * @param Response $response
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canEdit(Response $response, TokenInterface $token) : bool
    {
        return !$response->isPublished() && $this->isOwner($token, $response->getAuthor());
    }

    /**
     * Return true if current user can delete the $response
     *
     * @param Response $response
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canDelete(Response $response, TokenInterface $token) : bool
    {
        return $this->isOwner($token, $response->getAuthor());
    }

    /**
     * Return true if current user can publish the $response
     *
     * @param Response $response
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canPublish(Response $response, TokenInterface $token) : bool
    {
        return $this->isAdmin($token);
    }

    /**
     * Return true if current user can unpublish the $response
     *
     * @param Response $response
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canUnpublish(Response $response, TokenInterface $token) : bool
    {
        return $this->isAdmin($token);
    }

    /**
     * Return true if user can vote for the $response
     *
     * @param Response       $response
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canVote(Response $response, TokenInterface $token) : bool
    {
        return $this->isConnected($token) && $response->isPublished();
    }

    /**
     * Return true if user can unvote for the $response
     *
     * @param Response       $response
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canUnvote(Response $response, TokenInterface $token) : bool
    {
        return $this->canVote($response, $token);
    }

    /**
     * Return true if user can report the $response
     *
     * @param Response       $response
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canReport(Response $response, TokenInterface $token) : bool
    {
        return $this->canView($response, $token);
    }
}

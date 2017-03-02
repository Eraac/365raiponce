<?php

namespace CoreBundle\Security;

use CoreBundle\Entity\News;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class NewsVoter extends AbstractVoter
{
    /**
     * @param string $attribute
     * @param mixed $subject
     *
     * @return bool
     */
    protected function supports($attribute, $subject) : bool
    {
        return parent::supports($attribute, $subject) && $subject instanceof News;
    }

    /**
     * Return true is current user can view the $news
     *
     * @param News $news
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canView(News $news, TokenInterface $token) : bool
    {
        $now = new \DateTime();

        return $now > $news->getStartAt() && $now < $news->getEndAt();
    }

    /**
     * Return true if current user can edit the $news
     *
     * @param News $news
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canEdit(News $news, TokenInterface $token) : bool
    {
        return $this->isAdmin($token);
    }

    /**
     * Return true if current user can delete the $news
     *
     * @param News $news
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function canDelete(News $news, TokenInterface $token) : bool
    {
        return $this->isAdmin($token);
    }
}

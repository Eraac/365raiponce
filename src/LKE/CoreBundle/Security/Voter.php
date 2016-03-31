<?php

namespace LKE\CoreBundle\Security;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManager;
use Symfony\Component\Security\Core\Authorization\Voter\Voter as BaseVoter;
use LKE\UserBundle\Interfaces\PublishableInterface;
use LKE\UserBundle\Interfaces\ReadAccessInterface;
use LKE\UserBundle\Interfaces\OwnableInterface;

class Voter extends BaseVoter
{
    const VIEW = 'view';
    const EDIT = 'edit';
    const DELETE = 'delete';

    private $decisionManager;

    public function __construct(AccessDecisionManager $decisionManager)
    {
        $this->decisionManager = $decisionManager;
    }

    protected function supports($attribute, $subject)
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, array(self::VIEW, self::EDIT, self::DELETE, self::DELETE_VOTE))) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute($access, $entity, TokenInterface $token)
    {
        $user = $token->getUser();

        // ROLE_ADMIN can do anything
        if ($this->isAdmin($token)) {
            return true;
        }

        switch($access)
        {
            case self::VIEW:
                return $this->canView($entity, $user);
            case self::EDIT:
                return $this->canEdit($entity, $user);
            case self::DELETE:
                return $this->canDelete($entity, $user);
        }

        throw new \LogicException('This code should not be reached!');
    }

    protected function canView($entity, $user = null)
    {
        return $this->isFullyReadable($entity) || $this->isPublished($entity) || $this->isOwner($entity, $user);
    }

    protected function canEdit($entity, $user)
    {
        return ($entity instanceof PublishableInterface && !$entity->isPublished() && $this->isOwner($entity, $user));
    }

    protected function canDelete($entity, $user)
    {
        return $this->isOwner($entity, $user);
    }

    protected function isFullyReadable($entity)
    {
        return ($entity instanceof ReadAccessInterface);
    }

    protected function isPublished($entity)
    {
        return ($entity instanceof PublishableInterface && $entity->isPublished());
    }

    protected function isOwner($entity, $user)
    {
        return ($entity instanceof OwnableInterface && $entity->getOwner() === $user);
    }

    private function isAdmin($token)
    {
        return ($this->decisionManager->decide($token, array('ROLE_ADMIN')));
    }
}

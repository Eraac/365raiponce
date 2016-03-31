<?php

namespace LKE\CoreBundle\Security;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManager;
use Symfony\Component\Security\Core\Authorization\Voter\Voter as BaseVoter;
use LKE\UserBundle\Entity\User;

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
        if (!in_array($attribute, array(self::VIEW, self::EDIT, self::DELETE))) {
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

        $user = $token->getUser();
        $method = 'can' . ucfirst($access);

        if (method_exists($this, $method)) {
            return $this->$method($entity, $user);
        }

        throw new \LogicException('This code should not be reached!');
    }

    protected function canView($entity, $user)
    {
        return false;
    }

    protected function canEdit($entity, $user)
    {
        return false;
    }

    protected function canDelete($entity, $user)
    {
        return false;
    }

    private function isAdmin($token)
    {
        return ($this->decisionManager->decide($token, array('ROLE_ADMIN')));
    }

    /**
     * @param $owner User
     * @param $currentUser User
     * @return bool
     */
    protected function isOwner($owner, $currentUser)
    {
        return $owner->getId() === $currentUser->getId();
    }
}

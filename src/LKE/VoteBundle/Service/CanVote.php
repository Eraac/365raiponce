<?php

namespace LKE\VoteBundle\Service;

use LKE\RemarkBundle\Entity\Response;
use LKE\UserBundle\Entity\User;

class CanVote
{
    public function canVote(Response $response, User $user)
    {
        return !$this->hasAlreadyVote($response, $user) && !$this->hasUseAllVoteToday($user);
    }

    private function hasAlreadyVote(Response $response, User $user)
    {
        return false; // TODO
    }

    private function hasUseAllVoteToday(User $user)
    {
        return false; // TODO
    }
}

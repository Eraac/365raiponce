<?php

namespace LKE\VoteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * VoteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VoteRepository extends EntityRepository
{
    public function getVoteByUserAndReponse($response, $user)
    {
        $qb = $this->createQueryBuilder('v')
                    ->where("v.response = :response")
                    ->andWhere("v.user = :user")
                    ->setParameters(array(
                        "response" => $response,
                        "user" => $user
                    ));

        return $qb->getQuery()->getSingleResult();
    }
}
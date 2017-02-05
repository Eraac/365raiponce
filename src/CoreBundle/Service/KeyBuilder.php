<?php

namespace CoreBundle\Service;

use CoreBundle\Entity\Remark;
use CoreBundle\Entity\Response;
use CoreBundle\Entity\VoteRemark;
use UserBundle\Entity\User;

/**
 * Helper for build key for cache doctrine
 *
 * @package CoreBundle\Service
 */
class KeyBuilder
{
    /**
     * @param Remark $remark
     *
     * @return string
     */
    static public function keyCountPublishedResponseForRemark(Remark $remark) : string
    {
        return sprintf(
            'remark-%d-count-published-response', $remark->getId()
        );
    }

    /**
     * @param Remark $remark
     *
     * @return string
     */
    static public function keyCountUnpublishedResponseForRemark(Remark $remark) : string
    {
        return sprintf(
            'remark-%d-count-unpublished-response', $remark->getId()
        );
    }

    /**
     * @param Remark $remark
     * @param User   $user
     * @param int    $type
     *
     * @return string
     */
    static public function keyUserHasVoteForRemark(Remark $remark, User $user, int $type) : string
    {
        $key = $type == VoteRemark::IS_SEXIST ? 'is-sexist' : 'already-lived';

        return sprintf(
            'user-%d-has-vote-%s-remark-%d', $user->getId(), $key, $remark->getId()
        );
    }

    /**
     * @param Remark $remark
     * @param int    $type
     *
     * @return string
     */
    static public function keyCountVoteForRemark(Remark $remark, int $type) : string
    {
        $key = $type == VoteRemark::IS_SEXIST ? 'is-sexist' : 'already-lived';

        return sprintf(
            'remark-%d-count-vote-%s', $remark->getId(), $key
        );
    }

    /**
     * @param Response $response
     * @param User     $user
     *
     * @return string
     */
    static public function keyUserHasVoteForResponse(Response $response, User $user) : string
    {
        return sprintf(
            'user-%d-has-vote-response-%d', $user->getId(), $response->getId()
        );
    }

    /**
     * @param Response $response
     *
     * @return string
     */
    static public function keyCountVoteForResponse(Response $response) : string
    {
        return sprintf(
            'response-%d-count-vote', $response->getId()
        );
    }

    /**
     * @param User $user
     *
     * @return string
     */
    static public function keyScoreUser(User $user) : string
    {
        return sprintf(
            'user-%d-score', $user->getId()
        );
    }
}

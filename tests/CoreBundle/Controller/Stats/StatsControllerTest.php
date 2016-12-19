<?php

namespace Tests\CoreBundle\Controller\Stats;

use Symfony\Component\HttpFoundation\Request;
use Tests\CoreBundle\Controller\AbstractControllerTest;

class StatsControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/stats';

    const URL_REMARKS       = self::PREFIX_URL . '/remarks';
    const URL_RESPONSES     = self::PREFIX_URL . '/responses';
    const URL_USERS         = self::PREFIX_URL . '/users';
    const URL_VOTES_REMARKS = self::PREFIX_URL . '/votes/remarks';

   // === GET - REMARK ===
    public function testGetRemarkSuccessful()
    {
        $headers = $this->getHeaderAdmin();

        $this->isSuccessful(Request::METHOD_GET, self::URL_REMARKS, [], $headers);
    }

    public function testGetRemarkUnauthorized()
    {
        $this->isUnauthorized(Request::METHOD_GET, self::URL_REMARKS);
    }

    public function testGetRemarkForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $this->isForbidden(Request::METHOD_GET, self::URL_REMARKS, [], $headers);
    }

    // === GET - RESPONSE ===
    public function testGetResponseSuccessful()
    {
        $headers = $this->getHeaderAdmin();

        $this->isSuccessful(Request::METHOD_GET, self::URL_RESPONSES, [], $headers);
    }

    public function testGetResponseUnauthorized()
    {
        $this->isUnauthorized(Request::METHOD_GET, self::URL_RESPONSES);
    }

    public function testGetResponseForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $this->isForbidden(Request::METHOD_GET, self::URL_RESPONSES, [], $headers);
    }

    // === GET - USERS ===
    public function testGetUserSuccessful()
    {
        $headers = $this->getHeaderAdmin();

        $this->isSuccessful(Request::METHOD_GET, self::URL_USERS, [], $headers);
    }

    public function testGetUserUnauthorized()
    {
        $this->isUnauthorized(Request::METHOD_GET, self::URL_USERS);
    }

    public function testGetUserForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $this->isForbidden(Request::METHOD_GET, self::URL_USERS, [], $headers);
    }

    // === GET - VOTE_REMARK ===
    public function testGetVoteRemarkSuccessful()
    {
        $headers = $this->getHeaderAdmin();

        $this->isSuccessful(Request::METHOD_GET, self::URL_VOTES_REMARKS, [], $headers);
    }

    public function testGetVoteRemarkUnauthorized()
    {
        $this->isUnauthorized(Request::METHOD_GET, self::URL_VOTES_REMARKS);
    }

    public function testGetVoteRemarkForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $this->isForbidden(Request::METHOD_GET, self::URL_VOTES_REMARKS, [], $headers);
    }
}

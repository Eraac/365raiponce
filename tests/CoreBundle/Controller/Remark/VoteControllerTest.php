<?php

namespace Tests\CoreBundle\Controller\Remark;

use CoreBundle\Entity\VoteRemark;
use Symfony\Component\HttpFoundation\Request;
use Tests\CoreBundle\Controller\AbstractControllerTest;

class VoteControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/remarks/';

    const URL = self::PREFIX_URL . self::REMARK_PUBLISHED_ID . '/votes';

    // === POST ===
    public function testPostSuccessful()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $params = ['type' => VoteRemark::IS_SEXIST];

        $this->isSuccessful(Request::METHOD_POST, self::URL, $params, $headers);
    }

    public function testPostBadRequest()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $params = ['type' => 2];

        $this->isBadRequest(Request::METHOD_POST, self::URL, $params, $headers);

        $params = ['type' => VoteRemark::IS_SEXIST];

        $this->isBadRequest(Request::METHOD_POST, self::URL, $params, $headers);
    }

    public function testPostUnauthorized()
    {
        $params = ['type' => VoteRemark::IS_SEXIST];

        $this->isUnauthorized(Request::METHOD_POST, self::URL, $params);
    }

    public function testPostForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER2['username'], self::USER2['password']);

        $url = self::PREFIX_URL . self::REMARK_UNPUBLISHED_ID . '/votes';

        $params = ['type' => VoteRemark::IS_SEXIST];

        $this->isForbidden(Request::METHOD_POST, $url, $params, $headers);
    }

    public function testPostNotFound()
    {
        $headers = $this->getHeaderConnect(self::USER2['username'], self::USER2['password']);

        $url = self::PREFIX_URL . '9876543210/votes';

        $params = ['type' => VoteRemark::IS_SEXIST];

        $this->isNotFound(Request::METHOD_POST, $url, $params, $headers);
    }

    // === DELETE ===
    public function testDeleteSuccessful()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $params = ['type' => VoteRemark::IS_SEXIST];

        $this->isSuccessful(Request::METHOD_DELETE, self::URL, $params, $headers);
    }

    public function testDeleteBadRequest()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $params = ['type' => 3];

        $this->isBadRequest(Request::METHOD_DELETE, self::URL, [], $headers);
        $this->isBadRequest(Request::METHOD_DELETE, self::URL, $params, $headers);
    }

    public function testDeleteUnauthorized()
    {
        $params = ['type' => VoteRemark::IS_SEXIST];

        $this->isUnauthorized(Request::METHOD_DELETE, self::URL, $params);
    }

    public function testDeleteForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER2['username'], self::USER2['password']);

        $url = self::PREFIX_URL . self::REMARK_UNPUBLISHED_ID . '/votes';

        $params = ['type' => VoteRemark::IS_SEXIST];

        $this->isForbidden(Request::METHOD_DELETE, $url, $params, $headers);
    }

    public function testDeleteNotFound()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $params = ['type' => VoteRemark::IS_SEXIST];

        $this->isNotFound(Request::METHOD_DELETE, self::URL, $params, $headers);

        $url = self::PREFIX_URL . '9876543210/votes';

        $this->isNotFound(Request::METHOD_DELETE, $url, $params, $headers);
    }
}

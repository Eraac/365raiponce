<?php

namespace Tests\CoreBundle\Controller\Response;

use CoreBundle\Entity\Remark;
use CoreBundle\Repository\EmotionRepository;
use CoreBundle\Repository\ThemeRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Tests\CoreBundle\Controller\AbstractControllerTest;

class VoteControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/responses/';

    const URL = self::PREFIX_URL . self::RESPONSE_PUBLISHED_ID . '/votes';

    // === POST ===
    public function testPostSuccessful()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $this->isSuccessful(Request::METHOD_POST, self::URL, [], $headers);
    }

    public function testPostUnauthorized()
    {
        $this->isUnauthorized(Request::METHOD_POST, self::URL);
    }

    public function testPostForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER2['username'], self::USER2['password']);
        $url = self::PREFIX_URL . self::RESPONSE_UNPUBLISHED_ID . '/votes';

        $this->isForbidden(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostNotFound()
    {
        $headers = $this->getHeaderConnect(self::USER2['username'], self::USER2['password']);
        $url = self::PREFIX_URL . '9876543210/votes';

        $this->isNotFound(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostConflict()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $this->isConflict(Request::METHOD_POST, self::URL, [], $headers);
    }

    // === DELETE ===
    public function testDeleteSuccessful()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $this->isSuccessful(Request::METHOD_DELETE, self::URL, [], $headers);
    }

    public function testDeleteUnauthorized()
    {
        $this->isUnauthorized(Request::METHOD_DELETE, self::URL);
    }

    public function testDeleteForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER2['username'], self::USER2['password']);
        $url = self::PREFIX_URL . self::RESPONSE_UNPUBLISHED_ID . '/votes';

        $this->isForbidden(Request::METHOD_DELETE, $url, [], $headers);
    }

    public function testDeleteNotFound()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $this->isNotFound(Request::METHOD_DELETE, self::URL, [], $headers);
    }
}

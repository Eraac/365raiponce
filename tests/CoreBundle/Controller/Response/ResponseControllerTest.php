<?php

namespace Tests\CoreBundle\Controller\Response;

use CoreBundle\Entity\Remark;
use CoreBundle\Repository\EmotionRepository;
use CoreBundle\Repository\ThemeRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Tests\CoreBundle\Controller\AbstractControllerTest;

class ResponseControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/responses/';
    const SUFFIX_URL_PUBLISH = '/publish';
    const SUFFIX_URL_UNPUBLISH = '/unpublish';

    // === POST - PUBLISH ===
    public function testPostPublishSuccessful()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $url = self::PREFIX_URL . self::RESPONSE_UNPUBLISHED_ID . self::SUFFIX_URL_PUBLISH;

        $this->isSuccessful(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostPublishUnauthorized()
    {
        $url = self::PREFIX_URL . self::RESPONSE_UNPUBLISHED_ID . self::SUFFIX_URL_PUBLISH;

        $this->isUnauthorized(Request::METHOD_POST, $url);
    }

    public function testPostPublishForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $url = self::PREFIX_URL . self::RESPONSE_UNPUBLISHED_ID . self::SUFFIX_URL_PUBLISH;

        $this->isForbidden(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostPublishNotFound()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $url = self::PREFIX_URL . '9876543210' . self::SUFFIX_URL_PUBLISH;

        $this->isNotFound(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostPublishConflict()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $url = self::PREFIX_URL . self::RESPONSE_UNPUBLISHED_ID . self::SUFFIX_URL_PUBLISH;

        $this->isConflict(Request::METHOD_POST, $url, [], $headers);
    }

    // === POST - UNPUBLISH ===
    public function testPostUnpublishSuccessful()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $url = self::PREFIX_URL . self::RESPONSE_UNPUBLISHED_ID . self::SUFFIX_URL_UNPUBLISH;

        $this->isSuccessful(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostUnpublishUnauthorized()
    {
        $url = self::PREFIX_URL . self::RESPONSE_UNPUBLISHED_ID . self::SUFFIX_URL_UNPUBLISH;

        $this->isUnauthorized(Request::METHOD_POST, $url);
    }

    public function testPostUnpublishForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $url = self::PREFIX_URL . self::RESPONSE_UNPUBLISHED_ID . self::SUFFIX_URL_UNPUBLISH;

        $this->isForbidden(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostUnpublishNotFound()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $url = self::PREFIX_URL . '9876543210' . self::SUFFIX_URL_UNPUBLISH;

        $this->isNotFound(Request::METHOD_POST, $url, [], $headers);
    }

    public function testPostUnpublishConflict()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $url = self::PREFIX_URL . self::RESPONSE_UNPUBLISHED_ID . self::SUFFIX_URL_UNPUBLISH;

        $this->isConflict(Request::METHOD_POST, $url, [], $headers);
    }
}

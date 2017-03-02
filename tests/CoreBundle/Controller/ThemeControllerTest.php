<?php

namespace Tests\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class ThemeControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/themes';

    private static $id = 0;

    // === CGET ===
    public function testCGetEmotionSuccessful()
    {
        $this->isSuccessful(Request::METHOD_GET, self::PREFIX_URL);
    }

    // === POST ===
    public function testPostEmotionSuccessful()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $params = [
            'name' => 'great theme',
        ];

        $this->isSuccessful(Request::METHOD_POST, self::PREFIX_URL, $params, $headers);

        self::$id = $this->getResponseContent('id');
    }

    public function testPostEmotionBadRequest()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);

        $params = [
            'name' => ' ',
        ];

        $this->isBadRequest(Request::METHOD_POST, self::PREFIX_URL, $params, $headers);
    }

    public function testPostEmotionUnauthorized()
    {
        $params = [
            'name' => 'great theme',
        ];

        $this->isUnauthorized(Request::METHOD_POST, self::PREFIX_URL, $params);
    }

    public function testPostEmotionForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $params = [
            'name' => 'great theme',
        ];

        $this->isForbidden(Request::METHOD_POST, self::PREFIX_URL, $params, $headers);
    }

    // === GET ===
    public function testGetEmotionSuccessful()
    {
        $url = self::PREFIX_URL . '/' . self::$id;

        $this->isSuccessful(Request::METHOD_GET, $url);
    }

    public function testGetEmotionNotFound()
    {
        $url = self::PREFIX_URL . '/9876543210';

        $this->isNotFound(Request::METHOD_GET, $url);
    }

    // === PATCH ===
    public function testPatchEmotionSuccessful()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);
        $url = self::PREFIX_URL . '/' . self::$id;

        $name = 'great theme rename';

        $params = [
            'name' => $name,
        ];

        $this->isSuccessful(Request::METHOD_PATCH, $url, $params, $headers);

        $newName = $this->getResponseContent('name');

        $this->assertEquals($name, $newName, 'Name is not changed');
    }

    public function testPatchEmotionBadRequest()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);
        $url = self::PREFIX_URL . '/' . self::$id;

        $params = [
            'name' => 'too long - too long - too long - too long - too long - too long - too long - too long',
        ];

        $this->isBadRequest(Request::METHOD_PATCH, $url, $params, $headers);
    }

    public function testPatchEmotionUnauthorized()
    {
        $url = self::PREFIX_URL . '/' . self::$id;

        $this->isUnauthorized(Request::METHOD_PATCH, $url);
    }

    public function testPatchEmotionForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);
        $url = self::PREFIX_URL . '/' . self::$id;

        $this->isForbidden(Request::METHOD_PATCH, $url, [], $headers);
    }

    public function testPatchEmotionNotFound()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);
        $url = self::PREFIX_URL . '/9876543210';

        $this->isNotFound(Request::METHOD_PATCH, $url, [], $headers);
    }

    // === DELETE ===
    public function testDeleteEmotionUnauthorized()
    {
        $url = self::PREFIX_URL . '/' . self::$id;

        $this->isUnauthorized(Request::METHOD_DELETE, $url);
    }

    public function testDeleteEmotionForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);
        $url = self::PREFIX_URL . '/' . self::$id;

        $this->isForbidden(Request::METHOD_DELETE, $url, [], $headers);
    }

    public function testDeleteEmotionSuccessful()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);
        $url = self::PREFIX_URL . '/' . self::$id;

        $this->isSuccessful(Request::METHOD_DELETE, $url, [], $headers);
    }

    public function testDeleteEmotionNotFound()
    {
        $headers = $this->getHeaderConnect(self::ADMIN['username'], self::ADMIN['password']);
        $url = self::PREFIX_URL . '/' . self::$id;

        $this->isNotFound(Request::METHOD_DELETE, $url, [], $headers);
    }
}

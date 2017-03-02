<?php

namespace Tests\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class NewsControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/news';

    private static $id = 0;

    // === CGET ===
    public function testCGetNewsSuccessful()
    {
        $headers = $this->getHeaderAdmin();

        $this->isSuccessful(Request::METHOD_GET, self::PREFIX_URL, [], $headers);
    }

    public function testCGetNewsUnauthorized()
    {
        $this->isUnauthorized(Request::METHOD_GET, self::PREFIX_URL);
    }

    public function testCGetNewsForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $this->isForbidden(Request::METHOD_GET, self::PREFIX_URL, [], $headers);
    }

    // === CGET - CURRENT ===
    public function testCGetCurrentNewsSuccessful()
    {
        $this->isSuccessful(Request::METHOD_GET, self::PREFIX_URL . '/current');
    }

    // === POST ===
    public function testPostNewsSuccessful()
    {
        $headers = $this->getHeaderAdmin();

        $params = [
            'message'   => 'information !',
            'start_at'  => 13300000,
            'end_at'    => 1543707988
        ];

        $this->isSuccessful(Request::METHOD_POST, self::PREFIX_URL, $params, $headers);

        self::$id = $this->getResponseContent('id');
    }

    public function testPostNewsBadRequest()
    {
        $headers = $this->getHeaderAdmin();

        $params = [
            'message'   => 'information !',
            'start_at'  => 13310000,
            'end_at'    => 13300000
        ];

        $this->isBadRequest(Request::METHOD_POST, self::PREFIX_URL, $params, $headers);
    }

    public function testPostNewsUnauthorized()
    {
        $params = [
            'message'   => 'information !',
            'start_at'  => 13300000,
            'end_at'    => 13310000
        ];

        $this->isUnauthorized(Request::METHOD_POST, self::PREFIX_URL, $params);
    }

    public function testPostNewsForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $params = [
            'message'   => 'information !',
            'start_at'  => 13300000,
            'end_at'    => 13310000
        ];

        $this->isForbidden(Request::METHOD_POST, self::PREFIX_URL, $params, $headers);
    }

    // === PATCH ===
    public function testPatchNewsSuccessful()
    {
        $headers = $this->getHeaderAdmin();

        $params = ['message' => 'information edited!'];

        $url = self::PREFIX_URL . '/' . self::$id;

        $this->isSuccessful(Request::METHOD_PATCH, $url, $params, $headers);
    }

    public function testPatchNewsBadRequest()
    {
        $headers = $this->getHeaderAdmin();

        $params = [
            'start_at'  => 13310000,
            'end_at'    => 13300000
        ];

        $url = self::PREFIX_URL . '/' . self::$id;

        $this->isBadRequest(Request::METHOD_PATCH, $url, $params, $headers);
    }

    public function testPatchNewsUnauthorized()
    {
        $params = ['message' => 'information edited!'];

        $url = self::PREFIX_URL . '/' . self::$id;

        $this->isUnauthorized(Request::METHOD_PATCH, $url, $params);
    }

    public function testPatchNewsForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $params = ['message' => 'information edited!'];

        $url = self::PREFIX_URL . '/' . self::$id;

        $this->isForbidden(Request::METHOD_PATCH, $url, $params, $headers);
    }

    public function testPatchNewsNotFound()
    {
        $headers = $this->getHeaderAdmin();

        $params = ['message' => 'information edited!'];

        $url = self::PREFIX_URL . '/9876543210';

        $this->isNotFound(Request::METHOD_PATCH, $url, $params, $headers);
    }

    // === GET ===
    public function testGetNewsSuccessful()
    {
        $url = self::PREFIX_URL . '/' . self::NEWS_CURRENT;

        $this->isSuccessful(Request::METHOD_GET, $url);
    }

    public function testGetNewsUnauthorized()
    {
        $url = self::PREFIX_URL . '/' . self::NEWS_OVER;

        $this->isUnauthorized(Request::METHOD_GET, $url);
    }

    public function testGetNewsForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);
        $url = self::PREFIX_URL . '/' . self::NEWS_OVER;

        $this->isForbidden(Request::METHOD_GET, $url, [], $headers);
    }

    public function testGetNewsNotFound()
    {
        $url = self::PREFIX_URL . '/9876543210';

        $this->isNotFound(Request::METHOD_GET, $url);
    }

    // === DELETE ===
    public function testDeleteNewsUnauthorized()
    {
        $url = self::PREFIX_URL . '/' . self::$id;

        $this->isUnauthorized(Request::METHOD_DELETE, $url);
    }

    public function testDeleteNewsForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);
        $url = self::PREFIX_URL . '/' . self::$id;

        $this->isForbidden(Request::METHOD_DELETE, $url, [], $headers);
    }

    public function testDeleteNewsSuccessful()
    {
        $headers = $this->getHeaderAdmin();
        $url = self::PREFIX_URL . '/' . self::$id;

        $this->isSuccessful(Request::METHOD_DELETE, $url, [], $headers);
    }

    public function testDeleteNewsNotFound()
    {
        $headers = $this->getHeaderAdmin();
        $url = self::PREFIX_URL . '/' . self::$id;

        $this->isNotFound(Request::METHOD_DELETE, $url, [], $headers);
    }
}

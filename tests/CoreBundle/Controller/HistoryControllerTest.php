<?php

namespace Tests\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class HistoryControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/histories';

    // === CGET ===
    public function testCGetHistorySuccessful()
    {
        $header = $this->getHeaderAdmin();

        $this->isSuccessful(Request::METHOD_GET, self::PREFIX_URL, [], $header);
    }

    public function testCGetHistoryUnauthorized()
    {
        $this->isUnauthorized(Request::METHOD_GET, self::PREFIX_URL);
    }

    public function testCGetHistoryForbidden()
    {
        $header = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $this->isForbidden(Request::METHOD_GET, self::PREFIX_URL, [], $header);
    }

    // === GET ===
    public function testGetHistorySuccessful()
    {
        $header = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $url = self::PREFIX_URL . '/' . self::HISTORY_ID;

        $this->isSuccessful(Request::METHOD_GET, $url, [], $header);
    }

    public function testGetHistoryUnauthorized()
    {
        $url = self::PREFIX_URL . '/' . self::HISTORY_ID;

        $this->isUnauthorized(Request::METHOD_GET, $url);
    }

    public function testGetHistoryForbidden()
    {
        $header = $this->getHeaderConnect(self::USER2['username'], self::USER2['password']);

        $url = self::PREFIX_URL . '/' . self::HISTORY_ID;

        $this->isForbidden(Request::METHOD_GET, $url, [], $header);
    }

    public function testGetHistoryNotFound()
    {
        $header = $this->getHeaderAdmin();

        $url = self::PREFIX_URL . '/9876543210';

        $this->isNotFound(Request::METHOD_GET, $url, [], $header);
    }
}

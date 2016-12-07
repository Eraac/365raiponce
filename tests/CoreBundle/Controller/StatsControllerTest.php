<?php

namespace Tests\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class StatsControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/stats';

   // === GET ===
    public function testGetSuccessful()
    {
        $headers = $this->getHeaderAdmin();

        $this->isSuccessful(Request::METHOD_GET, self::PREFIX_URL, [], $headers);
    }

    public function testGetBadRequest()
    {
        $headers = $this->getHeaderAdmin();

        $query = '?filter[before]=not-a-number';

        $this->isBadRequest(Request::METHOD_GET, self::PREFIX_URL . $query, [], $headers);
    }

    public function testGetUnauthorized()
    {
        $this->isUnauthorized(Request::METHOD_GET, self::PREFIX_URL);
    }

    public function testGetForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $this->isForbidden(Request::METHOD_GET, self::PREFIX_URL, [], $headers);
    }
}

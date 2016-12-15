<?php

namespace Tests\CoreBundle\Controller\Stats;

use Symfony\Component\HttpFoundation\Request;
use Tests\CoreBundle\Controller\AbstractControllerTest;

class RemarkControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/stats/remarks';

   // === GET ===
    public function testGetSuccessful()
    {
        $headers = $this->getHeaderAdmin();

        $this->isSuccessful(Request::METHOD_GET, self::PREFIX_URL, [], $headers);
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

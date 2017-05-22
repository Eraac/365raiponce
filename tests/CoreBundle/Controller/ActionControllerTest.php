<?php

namespace Tests\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class ActionControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/actions';

    // === GET ===
    public function testGetActionSuccessful()
    {
        $url = self::PREFIX_URL . '/' . self::ACTION_ID;

        $this->isSuccessful(Request::METHOD_GET, $url);
    }

    public function testGetActionNotFound()
    {
        $url = self::PREFIX_URL . '/9876543210';

        $this->isNotFound(Request::METHOD_GET, $url);
    }
}

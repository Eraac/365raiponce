<?php

namespace Tests\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class ExportControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/exports';
    const EXPORT_USERS_URL = self::PREFIX_URL . '/users';

    // === EXPORT USERS ===
    public function testExportUserSuccessful()
    {
        $headers = $this->getHeaderAdmin();

        $this->isSuccessful(Request::METHOD_GET, self::EXPORT_USERS_URL, [], $headers);
    }

    public function testExportUserUnauthorized()
    {
        $this->isUnauthorized(Request::METHOD_GET, self::EXPORT_USERS_URL);
    }

    public function testExportUserForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $this->isForbidden(Request::METHOD_GET, self::EXPORT_USERS_URL, [], $headers);
    }
}

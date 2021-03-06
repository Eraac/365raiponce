<?php

namespace Tests\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class GradeControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/grades';

    // === CGET ===
    public function testCGetGradeSuccessful()
    {
        $this->isSuccessful(Request::METHOD_GET, self::PREFIX_URL);
    }

    // === GET ===
    public function testGetGradeSuccessful()
    {
        $url = self::PREFIX_URL . '/' . self::GRADE_ID;

        $this->isSuccessful(Request::METHOD_GET, $url);
    }

    public function testGetGradeNotFound()
    {
        $url = self::PREFIX_URL . '/9876543210';

        $this->isNotFound(Request::METHOD_GET, $url);
    }
}

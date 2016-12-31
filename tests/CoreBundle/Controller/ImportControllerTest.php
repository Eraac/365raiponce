<?php

namespace Tests\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class ImportControllerTest extends AbstractControllerTest
{
    const PREFIX_URL = '/imports';
    const IMPORT_REMARKS_URL = self::PREFIX_URL . '/remarks';

    // === IMPORTS REMARKS ===
    public function testImportRemarkSuccessful()
    {
        $headers = $this->getHeaderAdmin();

        $params = [
            'remarks' => [
                [
                    'sentence' => 'blabla',
                    'context' => 'at office',
                    'emotion' => self::EMOTION_ID,
                    'theme' => self::THEME_ID,
                    'scaleEmotion' => 3
                ],
                [
                    'sentence' => 'blabla 2',
                    'context' => 'at office 2',
                    'emotion' => self::EMOTION_ID,
                    'theme' => self::THEME_ID,
                    'scaleEmotion' => 2
                ],
            ]
        ];

        $this->isSuccessful(Request::METHOD_POST, self::IMPORT_REMARKS_URL, $params, $headers);
    }

    public function testImportRemarkBadRequest()
    {
        $headers = $this->getHeaderAdmin();

        $params = [
            'remarks' => [
                [
                    'emotion' => self::EMOTION_ID,
                    'theme' => self::THEME_ID,
                    'scaleEmotion' => 16
                ],
                [
                    'sentence' => 'blabla',
                    'context' => 'at office',
                    'emotion' => self::EMOTION_ID,
                    'theme' => self::THEME_ID,
                    'scaleEmotion' => 2
                ],
            ]
        ];

        $this->isBadRequest(Request::METHOD_POST, self::IMPORT_REMARKS_URL, $params, $headers);
    }

    public function testImportRemarkUnauthorized()
    {
        $this->isUnauthorized(Request::METHOD_POST, self::IMPORT_REMARKS_URL);
    }

    public function testImportRemarkForbidden()
    {
        $headers = $this->getHeaderConnect(self::USER1['username'], self::USER1['password']);

        $this->isForbidden(Request::METHOD_POST, self::IMPORT_REMARKS_URL, [], $headers);
    }
}

<?php

namespace CoreBundle\Docs;

use Symfony\Component\HttpFoundation\Response;

interface ExportDocs extends Docs
{
    const SECTION = 'Export';
    const HEADERS = Docs::AUTH_HEADERS;

    const DEFAULT = [
        'section'        => self::SECTION,
        'authentication' => true,
        'resource'       => true,
        'headers'        => self::HEADERS,
    ];

    const GET_USERS = [
        'default' => self::DEFAULT,
        'statusCodes' => [
            Response::HTTP_ACCEPTED     => self::HTTP_ACCEPTED,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN
        ]
    ];
}

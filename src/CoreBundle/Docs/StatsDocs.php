<?php

namespace CoreBundle\Docs;

use Symfony\Component\HttpFoundation\Response;

interface StatsDocs extends Docs
{
    const SECTION = 'Stats';
    const HEADERS = Docs::AUTH_HEADERS;

    const DEFAULT = [
        'section'        => self::SECTION,
        'authentication' => true,
        'resource'       => true,
        'headers'        => self::HEADERS,
    ];


    const GET = [
        'default' => self::DEFAULT,
        'statusCodes'  => [
            Response::HTTP_OK           => self::HTTP_OK,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
        ],
        'filters' => [
            ['name' => 'filter[from]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Filter result by date (only content will be created after this date)'],
            ['name' => 'filter[to]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Filter result by date (only content will be created before this date)'],
        ],
    ];
}

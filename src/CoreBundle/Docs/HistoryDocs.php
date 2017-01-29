<?php

namespace CoreBundle\Docs;

use CoreBundle\Entity\History;
use Symfony\Component\HttpFoundation\Response;

interface HistoryDocs extends Docs
{
    const SECTION = 'History';
    const HEADERS = Docs::AUTH_HEADERS;

    const DEFAULT_OUTPUT = [
        'class'     => History::class,
        'parsers'   => self::OUTPUT_PARSER,
    ];

    const DEFAULT_REQUIREMENTS = [
        ['name' => 'history_id', 'dataType' => 'integer', 'description' => 'id of the history', 'requirement' => '\d+']
    ];

    const DEFAULT = [
        'section'        => self::SECTION,
        'authentication' => true,
        'resource'       => true,
        'headers'        => self::HEADERS,
    ];


    const CGET = [
        'default' => self::DEFAULT,
        'headers' => self::DEFAULT_HEADERS,
        'authentication' => false,
        'output'  => self::DEFAULT_OUTPUT,
        'statusCodes' => [
            Response::HTTP_OK           => self::HTTP_OK,
            Response::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
        ],
        'filters' => [
            self::FILTER_PAGINATION_PAGE,
            self::FILTER_PAGINATION_LIMIT,
        ],
    ];

    const GET = [
        'default' => self::DEFAULT,
        'headers' => self::DEFAULT_HEADERS,
        'authentication' => false,
        'output'  => self::DEFAULT_OUTPUT,
        'requirements' => self::DEFAULT_REQUIREMENTS,
        'statusCodes'  => [
            Response::HTTP_OK           => self::HTTP_OK,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            Response::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
    ];
}
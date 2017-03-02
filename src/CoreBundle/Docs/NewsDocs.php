<?php

namespace CoreBundle\Docs;

use CoreBundle\Entity\News;
use CoreBundle\Form\NewsType;
use Symfony\Component\HttpFoundation\Response;

interface NewsDocs extends Docs
{
    const SECTION = 'News';
    const HEADERS = Docs::AUTH_HEADERS;

    const DEFAULT_OUTPUT = [
        'class'     => News::class,
        'parsers'   => self::OUTPUT_PARSER,
    ];

    const DEFAULT_INPUT = [
        'class'   => NewsType::class,
        'parsers' => self::INPUT_PARSER,
    ];

    const DEFAULT = [
        'section'        => self::SECTION,
        'authentication' => true,
        'resource'       => true,
        'headers'        => self::HEADERS,
    ];

    const DEFAULT_REQUIREMENTS = [
        ['name' => 'news_id', 'dataType' => 'integer', 'description' => 'id of the news', 'requirement' => '\d+']
    ];


    const CGET = [
        'default' => self::DEFAULT,
        'output'  => self::DEFAULT_OUTPUT,
        'statusCodes' => [
            Response::HTTP_OK           => self::HTTP_OK,
            Response::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN
        ],
        'filters' => [
            ['name' => 'filter[started_before]', 'dataType' => 'string', 'description' => 'Search by started date'],
            ['name' => 'filter[started_after]', 'dataType' => 'string', 'description' => 'Search by started date'],
            ['name' => 'filter[ended_before]', 'dataType' => 'string', 'description' => 'Search by ended date'],
            ['name' => 'filter[ended_after]', 'dataType' => 'string', 'description' => 'Search by ended date'],
            self::FILTER_CREATED_BEFORE,
            self::FILTER_CREATED_AFTER,
            self::FILTER_UPDATED_BEFORE,
            self::FILTER_UPDATED_AFTER,
            self::ORDER_ID,
            ['name' => 'filter[_order][start_at]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by start date'],
            ['name' => 'filter[_order][end_at]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by end date'],
            self::FILTER_PAGINATION_PAGE,
            self::FILTER_PAGINATION_LIMIT,
        ],
    ];

    const CGET_CURRENT = [
        'default' => self::DEFAULT,
        'headers' => self::DEFAULT_HEADERS,
        'authentification' => false,
        'output'  => self::DEFAULT_OUTPUT,
        'statusCodes' => [
            Response::HTTP_OK => self::HTTP_OK
        ],
        'filters' => [
            self::FILTER_PAGINATION_PAGE,
            self::FILTER_PAGINATION_LIMIT,
        ]
    ];

    const GET = [
        'default' => self::DEFAULT,
        'output'  => self::DEFAULT_OUTPUT,
        'requirements' => self::DEFAULT_REQUIREMENTS,
        'statusCodes'  => [
            Response::HTTP_OK           => self::HTTP_OK,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            Response::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
    ];

    const POST = [
        'default'   => self::DEFAULT,
        'output'    => self::DEFAULT_OUTPUT,
        'input'     => self::DEFAULT_INPUT,
        'statusCodes' => [
            Response::HTTP_CREATED      => self::HTTP_CREATED,
            Response::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
        ],
    ];

    const PATCH = [
        'default'       => self::DEFAULT,
        'requirements'  => self::DEFAULT_REQUIREMENTS,
        'output'        => self::DEFAULT_OUTPUT,
        'input'         => self::DEFAULT_INPUT,
        'statusCodes'   => [
            Response::HTTP_OK           => self::HTTP_OK,
            Response::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            Response::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
    ];

    const DELETE = [
        'default'       => self::DEFAULT,
        'requirements'  => self::DEFAULT_REQUIREMENTS,
        'statusCodes' => [
            Response::HTTP_NO_CONTENT   => self::HTTP_NO_CONTENT,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            Response::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
    ];
}

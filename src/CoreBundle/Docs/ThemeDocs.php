<?php

namespace CoreBundle\Docs;

use CoreBundle\Entity\Theme;
use CoreBundle\Form\ThemeType;
use Symfony\Component\HttpFoundation\Response;

interface ThemeDocs extends Docs
{
    const SECTION = 'Theme';
    const HEADERS = Docs::AUTH_HEADERS;

    const DEFAULT_OUTPUT = [
        'class'     => Theme::class,
        'parsers'   => self::OUTPUT_PARSER,
    ];

    const DEFAULT_INPUT = [
        'class'   => ThemeType::class,
        'parsers' => self::INPUT_PARSER,
    ];

    const DEFAULT_REQUIREMENTS = [
        ['name' => 'theme_id', 'dataType' => 'integer', 'description' => 'id of the theme', 'requirement' => '\d+']
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
            self::FILTER_ID,
            ['name' => 'filter[name]', 'dataType' => 'string', 'description' => 'Search by name'],
            self::ORDER_ID,
            ['name' => 'filter[_order][name]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by name'],
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

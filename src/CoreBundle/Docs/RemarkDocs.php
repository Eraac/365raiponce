<?php

namespace CoreBundle\Docs;

use CoreBundle\Entity\Remark;
use CoreBundle\Form\RemarkType;
use CoreBundle\Form\RemarkEditType;
use Symfony\Component\HttpFoundation\Response;

interface RemarkDocs extends Docs
{
    const SECTION = 'Remark';
    const HEADERS = Docs::DEFAULT_HEADERS;

    const DEFAULT_OUTPUT = [
        'class'     => Remark::class,
        'parsers'   => self::OUTPUT_PARSER,
        'groups'    => ['Default', 'stats'],
    ];

    const DEFAULT_INPUT = [
        'class'   => RemarkType::class,
        'parsers' => self::INPUT_PARSER,
    ];

    const DEFAULT_REQUIREMENTS = [
        ['name' => 'remark_id', 'dataType' => 'integer', 'description' => 'id of the remark', 'requirement' => 'A valid remark id']
    ];

    const DEFAULT = [
        'section'        => self::SECTION,
        'authentication' => false,
        'resource'       => true,
        'headers'        => self::HEADERS,
    ];

    const DEFAULT_AUTH = [
        'section'        => self::SECTION,
        'authentication' => true,
        'resource'       => true,
        'headers'        => self::AUTH_HEADERS,
    ];

    const FILTERS = [
        self::FILTER_POSTED_BEFORE,
        self::FILTER_POSTED_AFTER,
        self::FILTER_EMOTION,
        self::FILTER_THEME,
        self::ORDER_ID,
        self::FILTER_CREATED_BEFORE,
        self::FILTER_CREATED_AFTER,
        self::FILTER_UPDATED_BEFORE,
        self::FILTER_UPDATED_AFTER,
        ['name' => 'filter[_order][posted_at]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by posted at'],
        self::ORDER_EMOTION,
        self::ORDER_THEME,
        ['name' => 'filter[_order][scale_emotion]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by scale emotion'],
        self::FILTER_PAGINATION_PAGE,
        self::FILTER_PAGINATION_LIMIT,
    ];


    const CGET = [
        'default' => self::DEFAULT,
        'output'  => self::DEFAULT_OUTPUT,
        'statusCodes' => [
            Response::HTTP_OK           => self::HTTP_OK,
            Response::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
        ],
        'filters' => self::FILTERS,
    ];

    const CGET_UNPUBLISHED = [
        'default' => self::DEFAULT_AUTH,
        'output'  => self::DEFAULT_OUTPUT,
        'statusCodes' => [
            Response::HTTP_OK           => self::HTTP_OK,
            Response::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
        ],
        'filters' => self::FILTERS,
    ];

    const GET = [
        'default'      => self::DEFAULT,
        'output'       => self::DEFAULT_OUTPUT,
        'requirements' => self::DEFAULT_REQUIREMENTS,
        'statusCodes'  => [
            Response::HTTP_OK           => self::HTTP_OK,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            Response::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
    ];

    const POST = [
        'default'     => self::DEFAULT,
        'output'      => self::DEFAULT_OUTPUT,
        'input'       => self::DEFAULT_INPUT,
        'statusCodes' => [
            Response::HTTP_CREATED      => self::HTTP_CREATED,
            Response::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
        ],
    ];

    const PATCH = [
        'default'       => self::DEFAULT_AUTH,
        'output'        => self::DEFAULT_OUTPUT,
        'input'         => [
            'class'   => RemarkEditType::class,
            'parsers' => self::INPUT_PARSER,
        ],
        'statusCodes'   => [
            Response::HTTP_OK           => self::HTTP_OK,
            Response::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            Response::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
    ];

    const DELETE = [
        'default'       => self::DEFAULT_AUTH,
        'requirements'  => self::DEFAULT_REQUIREMENTS,
        'statusCodes'   => [
            Response::HTTP_NO_CONTENT   => self::HTTP_NO_CONTENT,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            Response::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
    ];

    const PUBLISH = [
        'default'       => self::DEFAULT_AUTH,
        'requirements'  => self::DEFAULT_REQUIREMENTS,
        'statusCodes'   => [
            Response::HTTP_NO_CONTENT   => self::HTTP_NO_CONTENT,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            Response::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
            Response::HTTP_CONFLICT     => self::HTTP_CONFLICT,
        ]
    ];

    const UNPUBLISH = self::PUBLISH;
}

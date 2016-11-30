<?php

namespace CoreBundle\Docs;

use CoreBundle\Entity\Response;
use CoreBundle\Form\ResponseType;
use Symfony\Component\HttpFoundation\Response as SFResponse;

interface ResponseDocs extends Docs
{
    const SECTION = 'Response';

    const DEFAULT_OUTPUT = [
        'class'     => Response::class,
        'parsers'   => self::OUTPUT_PARSER,
        'groups'    => ['Default', 'stats'],
    ];

    const DEFAULT_INPUT = [
        'class'   => ResponseType::class,
        'parsers' => self::INPUT_PARSER,
    ];

    const REMARK_REQUIREMENTS = [
        ['name' => 'remark_id', 'dataType' => 'integer', 'description' => 'id of the remark', 'requirement' => 'A valid remark id']
    ];

    const RESPONSE_REQUIREMENTS = [
        ['name' => 'response_id', 'dataType' => 'integer', 'description' => 'id of the response', 'requirement' => 'A valid response id']
    ];

    const DEFAULT = [
        'section'        => self::SECTION,
        'authentication' => false,
        'resource'       => true,
        'headers'        => self::DEFAULT_HEADERS,
    ];

    const DEFAULT_AUTH = [
        'section'        => self::SECTION,
        'authentication' => true,
        'resource'       => true,
        'headers'        => self::AUTH_HEADERS,
    ];

    const FILTERS = [
        ['name' => 'filter[posted_before]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Search by posted date'],
        ['name' => 'filter[posted_after]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Search by posted date'],
        ['name' => 'filter[remark]', 'dataType' => 'integer', 'description' => 'Search by remark (id)'],
        self::FILTER_CREATED_BEFORE,
        self::FILTER_CREATED_AFTER,
        self::FILTER_UPDATED_BEFORE,
        self::FILTER_UPDATED_AFTER,
        self::ORDER_ID,
        ['name' => 'filter[_order][posted_at]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by publication date'],
        ['name' => 'filter[_order][remark]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by remark'],
        self::FILTER_PAGINATION_PAGE,
        self::FILTER_PAGINATION_LIMIT,
    ];


    const CGET = [
        'default' => self::DEFAULT,
        'output'  => self::DEFAULT_OUTPUT,
        'statusCodes' => [
            SFResponse::HTTP_OK           => self::HTTP_OK,
            SFResponse::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            SFResponse::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
        'requirements'  => self::REMARK_REQUIREMENTS,
        'filters'       => self::FILTERS,
    ];

    const CGET_UNPUBLISHED = [
        'default' => self::DEFAULT_AUTH,
        'output'  => self::DEFAULT_OUTPUT,
        'statusCodes' => [
            SFResponse::HTTP_OK           => self::HTTP_OK,
            SFResponse::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            SFResponse::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            SFResponse::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
        ],
        'filters' => self::FILTERS,
    ];

    const CGET_REPORTED = [
        'default'       => self::DEFAULT_AUTH,
        'output'        => self::DEFAULT_OUTPUT,
        'statusCodes'   => [
            SFResponse::HTTP_OK           => self::HTTP_OK,
            SFResponse::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            SFResponse::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            SFResponse::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
        ],
        'filters' => [
            ['name' => 'filter[reported_before]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Search by posted date'],
            ['name' => 'filter[reported_after]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Search by posted date'],
            ['name' => 'filter[response]', 'dataType' => 'integer', 'description' => 'Search by response (id)'],
            ['name' => 'filter[_order][reported_at]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by date fo the report'],
            ['name' => 'filter[_order][response]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by response'],
            self::FILTER_PAGINATION_PAGE,
            self::FILTER_PAGINATION_LIMIT,
        ]
    ];

    const GET = [
        'default'      => self::DEFAULT,
        'output'       => self::DEFAULT_OUTPUT,
        'requirements' => self::RESPONSE_REQUIREMENTS,
        'statusCodes'  => [
            SFResponse::HTTP_OK           => self::HTTP_OK,
            SFResponse::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            SFResponse::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            SFResponse::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
    ];

    const POST = [
        'default'     => self::DEFAULT,
        'output'      => self::DEFAULT_OUTPUT,
        'input'       => self::DEFAULT_INPUT,
        'requirements' => self::REMARK_REQUIREMENTS,
        'statusCodes' => [
            SFResponse::HTTP_CREATED      => self::HTTP_CREATED,
            SFResponse::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            SFResponse::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            SFResponse::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            SFResponse::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
    ];

    const PATCH = [
        'default'       => self::DEFAULT_AUTH,
        'output'        => self::DEFAULT_OUTPUT,
        'input'         => self::DEFAULT_INPUT,
        'requirements'  => self::RESPONSE_REQUIREMENTS,
        'statusCodes'   => [
            SFResponse::HTTP_OK           => self::HTTP_OK,
            SFResponse::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            SFResponse::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            SFResponse::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            SFResponse::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
    ];

    const DELETE = [
        'default'       => self::DEFAULT_AUTH,
        'requirements'  => self::RESPONSE_REQUIREMENTS,
        'statusCodes'   => [
            SFResponse::HTTP_NO_CONTENT   => self::HTTP_NO_CONTENT,
            SFResponse::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            SFResponse::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            SFResponse::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
    ];

    const PUBLISH = [
        'default'       => self::DEFAULT_AUTH,
        'requirements'  => self::RESPONSE_REQUIREMENTS,
        'statusCodes'   => [
            SFResponse::HTTP_NO_CONTENT   => self::HTTP_NO_CONTENT,
            SFResponse::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            SFResponse::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            SFResponse::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
            SFResponse::HTTP_CONFLICT     => self::HTTP_CONFLICT,
        ]
    ];

    const UNPUBLISH = self::PUBLISH;

    const REPORT = [
        'default'       => self::DEFAULT,
        'requirements'  => self::RESPONSE_REQUIREMENTS,
        'statusCodes'   => [
            SFResponse::HTTP_NO_CONTENT   => self::HTTP_NO_CONTENT,
            SFResponse::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            SFResponse::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            SFResponse::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ]
    ];
}

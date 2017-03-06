<?php

namespace CoreBundle\Docs;

use CoreBundle\Entity\Grade;
use Symfony\Component\HttpFoundation\Response;

interface GradeDocs extends Docs
{
    const SECTION = 'Grade';
    const HEADERS = Docs::AUTH_HEADERS;

    const DEFAULT_OUTPUT = [
        'class'     => Grade::class,
        'parsers'   => self::OUTPUT_PARSER,
    ];

    const DEFAULT_REQUIREMENTS = [
        ['name' => 'grade_id', 'dataType' => 'integer', 'description' => 'id of the grade', 'requirement' => '\d+']
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
            ['name' => 'filter[score_min]', 'dataType' => 'integer', 'description' => 'Search by score'],
            ['name' => 'filter[score_max]', 'dataType' => 'integer', 'description' => 'Search by score'],
            self::ORDER_ID,
            ['name' => 'filter[_order][name]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by name'],
            ['name' => 'filter[_order][score]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by score'],
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
}

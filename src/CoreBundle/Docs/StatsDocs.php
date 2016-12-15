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

    const DEFAULT_STATUS_CODES = [
        Response::HTTP_OK           => self::HTTP_OK,
        Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
        Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
    ];

    const ORDER_CREATED_YEAR  = ['name' => 'filter[_order][created_year]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by created year'];
    const ORDER_CREATED_MONTH = ['name' => 'filter[_order][created_month]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by created month'];
    const ORDER_CREATED_DAY   = ['name' => 'filter[_order][created_day]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by created day'];
    const GROUP_COUNT         = ['name' => 'filter[_group][count]', 'pattern' => '(ASC|DESC)', 'description' => 'Order result by count'];

    const GROUP_CREATED_YEAR  = ['name' => 'filter[_group][]=created_year', 'description' => 'Group by created year'];
    const GROUP_CREATED_MONTH = ['name' => 'filter[_group][]=created_month', 'description' => 'Group by created month'];
    const GROUP_CREATED_DAY   = ['name' => 'filter[_group][]=created_day', 'description' => 'Group by created day'];


    const GET = [
        'default' => self::DEFAULT,
        'statusCodes'  => self::DEFAULT_STATUS_CODES,
        'filters' => [
            ['name' => 'filter[from]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Filter result by date (only content will be created after this date)'],
            ['name' => 'filter[to]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Filter result by date (only content will be created before this date)'],
        ],
    ];

    const GET_REMARKS = [
        'default' => self::DEFAULT,
        'statusCodes' => self::DEFAULT_STATUS_CODES,
        'filters' => [
            self::FILTER_CREATED_BEFORE,
            self::FILTER_CREATED_AFTER,
            ['name' => 'filter[posted_before]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Filter result by date (only content will be posted after this date)'],
            ['name' => 'filter[posted_after]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Filter result by date (only content will be posted before this date)'],
            ['name' => 'filter[emotion]', 'dataType' => 'integer', 'description' => 'Search by emotion (id)'],
            ['name' => 'filter[theme]', 'dataType' => 'integer', 'description' => 'Search by theme (id)'],
            self::ORDER_CREATED_YEAR,
            self::ORDER_CREATED_MONTH,
            self::ORDER_CREATED_DAY,
            ['name' => 'filter[_order][posted_year]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by posted year'],
            ['name' => 'filter[_order][posted_month]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by posted month'],
            ['name' => 'filter[_order][posted_day]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by posted day'],
            ['name' => 'filter[_order][emotion]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by emotion'],
            ['name' => 'filter[_order][theme]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by theme'],
            self::GROUP_COUNT,
            self::GROUP_CREATED_YEAR,
            self::GROUP_CREATED_MONTH,
            self::GROUP_CREATED_DAY,
            ['name' => 'filter[_group][]=posted_year', 'description' => 'Group by posted year'],
            ['name' => 'filter[_group][]=posted_month', 'description' => 'Group by posted month'],
            ['name' => 'filter[_group][]=posted_day', 'description' => 'Group by posted day'],
            ['name' => 'filter[_group][]=emotion', 'description' => 'Group by emotion'],
            ['name' => 'filter[_group][]=theme', 'description' => 'Group by theme'],
        ]
    ];
}

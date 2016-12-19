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
    const ORDER_POSTED_YEAR   = ['name' => 'filter[_order][posted_year]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by posted year'];
    const ORDER_POSTED_MONTH  = ['name' => 'filter[_order][posted_month]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by posted month'];
    const ORDER_POSTED_DAY    = ['name' => 'filter[_order][posted_day]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by posted day'];
    const ORDER_COUNT         = ['name' => 'filter[_order][count]', 'pattern' => '(ASC|DESC)', 'description' => 'Order result by count'];

    const GROUP_CREATED_YEAR  = ['name' => 'filter[_group][]=created_year', 'description' => 'Group by created year'];
    const GROUP_CREATED_MONTH = ['name' => 'filter[_group][]=created_month', 'description' => 'Group by created month'];
    const GROUP_CREATED_DAY   = ['name' => 'filter[_group][]=created_day', 'description' => 'Group by created day'];
    const GROUP_POSTED_YEAR   = ['name' => 'filter[_group][]=posted_year', 'description' => 'Group by posted year'];
    const GROUP_POSTED_MONTH  = ['name' => 'filter[_group][]=posted_month', 'description' => 'Group by posted month'];
    const GROUP_POSTED_DAY    = ['name' => 'filter[_group][]=posted_day', 'description' => 'Group by posted day'];
    const GROUP_EMOTION       = ['name' => 'filter[_group][]=emotion', 'description' => 'Group by emotion'];
    const GROUP_THEME         = ['name' => 'filter[_group][]=theme', 'description' => 'Group by theme'];


    const GET = [
        'default' => self::DEFAULT,
        'statusCodes'  => self::DEFAULT_STATUS_CODES,
        'filters' => [
            ['name' => 'filter[from]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Filter result by date (only content will be created after this date)'],
            ['name' => 'filter[to]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Filter result by date (only content will be created before this date)'],
        ],
    ];

    const GET_REMARKS = [
        'default'       => self::DEFAULT,
        'statusCodes'   => self::DEFAULT_STATUS_CODES,
        'filters'       => [
            self::FILTER_CREATED_BEFORE,
            self::FILTER_CREATED_AFTER,
            self::FILTER_POSTED_BEFORE,
            self::FILTER_POSTED_AFTER,
            self::FILTER_EMOTION,
            self::FILTER_THEME,
            self::ORDER_CREATED_YEAR,
            self::ORDER_CREATED_MONTH,
            self::ORDER_CREATED_DAY,
            self::ORDER_POSTED_YEAR,
            self::ORDER_POSTED_MONTH,
            self::ORDER_POSTED_DAY,
            self::ORDER_EMOTION,
            self::ORDER_THEME,
            self::ORDER_COUNT,
            self::GROUP_CREATED_YEAR,
            self::GROUP_CREATED_MONTH,
            self::GROUP_CREATED_DAY,
            self::GROUP_POSTED_YEAR,
            self::GROUP_POSTED_MONTH,
            self::GROUP_POSTED_DAY,
            self::GROUP_EMOTION,
            self::GROUP_THEME,
        ]
    ];

    const GET_RESPONSES = [
        'default'       => self::DEFAULT,
        'statusCodes'   => self::DEFAULT_STATUS_CODES,
        'filters'       => [
            self::FILTER_CREATED_BEFORE,
            self::FILTER_CREATED_AFTER,
            self::FILTER_POSTED_BEFORE,
            self::FILTER_POSTED_AFTER,
            self::FILTER_EMOTION,
            self::FILTER_THEME,
            ['name' => 'filter[remark]', 'dataType' => 'integer', 'description' => 'Search by remark (id)'],
            ['name' => 'filter[author]', 'dataType' => 'integer', 'description' => 'Search by author (id)'],
            self::ORDER_CREATED_YEAR,
            self::ORDER_CREATED_MONTH,
            self::ORDER_CREATED_DAY,
            self::ORDER_POSTED_YEAR,
            self::ORDER_POSTED_MONTH,
            self::ORDER_POSTED_DAY,
            self::ORDER_EMOTION,
            ['name' => 'filter[_order][remark]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by remark'],
            ['name' => 'filter[_order][author]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by author (username)'],
            self::ORDER_THEME,
            self::ORDER_COUNT,
            self::GROUP_CREATED_YEAR,
            self::GROUP_CREATED_MONTH,
            self::GROUP_CREATED_DAY,
            self::GROUP_POSTED_YEAR,
            self::GROUP_POSTED_MONTH,
            self::GROUP_POSTED_DAY,
            self::GROUP_EMOTION,
            self::GROUP_THEME,
            ['name' => 'filter[_group][]=remark', 'description' => 'Group by remark'],
            ['name' => 'filter[_group][]=author', 'description' => 'Group by author'],
        ]
    ];

    const GET_USERS = [
        'default'       => self::DEFAULT,
        'statusCodes'   => self::DEFAULT_STATUS_CODES,
        'filters'       => [
            self::FILTER_CREATED_BEFORE,
            self::FILTER_CREATED_AFTER,
            self::ORDER_CREATED_YEAR,
            self::ORDER_CREATED_MONTH,
            self::ORDER_CREATED_DAY,
            self::ORDER_COUNT,
            self::GROUP_CREATED_YEAR,
            self::GROUP_CREATED_MONTH,
            self::GROUP_CREATED_DAY,
        ]
    ];
}

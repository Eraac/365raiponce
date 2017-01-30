<?php

namespace UserBundle\Docs;

use CoreBundle\Docs\Docs;
use CoreBundle\Entity\History;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\User;
use UserBundle\Form\UserEditType;

interface MeDocs extends Docs
{
    const SECTION = 'Me';
    const HEADERS = Docs::AUTH_HEADERS;

    const DEFAULT_OUTPUT = [
        'class'     => User::class,
        'parsers'   => self::OUTPUT_PARSER,
        'groups'    => ['default', 'me'],
    ];

    const DEFAULT_INPUT  = [
        'class'      => UserEditType::class,
        'parsers'    => self::INPUT_PARSER,
    ];

    const DEFAULT = [
        'section'        => self::SECTION,
        'authentication' => true,
        'resource'       => true,
        'headers'        => self::HEADERS,
    ];

    const CGET_RESPONSES = [
        'default' => self::DEFAULT,
        'output' => [
            'class' => Response::class,
            'parsers' => self::OUTPUT_PARSER,
            'groups' => ['Default', 'stats', 'info']
        ],
        'statusCodes' => [
            Response::HTTP_OK           => self::HTTP_OK,
            Response::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED
        ],
        'filters' => [
            self::FILTER_PAGINATION_PAGE,
            self::FILTER_PAGINATION_LIMIT,
        ],
    ];

    const CGET_RESPONSES_UNPUBLISHED = self::CGET_RESPONSES;

    const CGET_HISTORIES = [
        'default' => self::DEFAULT,
        'output' => [
            'class' => History::class,
            'parsers' => self::OUTPUT_PARSER,
        ],
        'statusCodes' => [
            Response::HTTP_OK           => self::HTTP_OK,
            Response::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED
        ],
        'filters' => [
            self::FILTER_PAGINATION_PAGE,
            self::FILTER_PAGINATION_LIMIT,
            self::FILTER_CREATED_BEFORE,
            self::FILTER_CREATED_AFTER,
            self::FILTER_UPDATED_BEFORE,
            self::FILTER_UPDATED_AFTER,
            ['name' => 'filter[is_used_for_score]', 'pattern' => '(0|1)', 'description' => 'Search by used for score'],
            ['name' => 'filter[action]', 'dataType' => 'integer', 'description' => 'Search by action (id)'],
            ['name' => 'filter[_order][is_used_for_score]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by used for score'],
            ['name' => 'filter[_order][action]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by action (id)'],
            ['name' => 'filter[_order][user]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by user (username)'],
        ],
    ];

    const GET = [
        'default' => self::DEFAULT,
        'output'  => self::DEFAULT_OUTPUT,
        'statusCodes' => [
            Response::HTTP_OK           => self::HTTP_OK,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED
        ],
    ];

    const PATCH = [
        'default' => self::DEFAULT,
        'output'  => self::DEFAULT_OUTPUT,
        'input'   => self::DEFAULT_INPUT,
        'statusCodes' => [
            Response::HTTP_OK           => self::HTTP_OK,
            Response::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED
        ],
    ];

    const DELETE = [
        'default' => self::DEFAULT,
        'statusCodes' => [
            Response::HTTP_NO_CONTENT   => self::HTTP_NO_CONTENT,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED
        ],
    ];
}

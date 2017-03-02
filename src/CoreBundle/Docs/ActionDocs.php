<?php

namespace CoreBundle\Docs;

use CoreBundle\Entity\Action;
use Symfony\Component\HttpFoundation\Response;

interface ActionDocs extends Docs
{
    const SECTION = 'Action';
    const HEADERS = Docs::AUTH_HEADERS;

    const DEFAULT_OUTPUT = [
        'class'     => Action::class,
        'parsers'   => self::OUTPUT_PARSER,
    ];

    const DEFAULT_REQUIREMENTS = [
        ['name' => 'action_id', 'dataType' => 'integer', 'description' => 'id of the action', 'requirement' => '\d+']
    ];

    const DEFAULT = [
        'section'        => self::SECTION,
        'authentication' => false,
        'resource'       => true,
        'headers'        => self::HEADERS,
    ];


    const GET = [
        'default' => self::DEFAULT,
        'headers' => self::DEFAULT_HEADERS,
        'output'  => self::DEFAULT_OUTPUT,
        'requirements' => self::DEFAULT_REQUIREMENTS,
        'statusCodes'  => [
            Response::HTTP_OK           => self::HTTP_OK,
            Response::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
    ];
}

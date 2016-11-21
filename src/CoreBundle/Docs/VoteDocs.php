<?php

namespace CoreBundle\Docs;

use Symfony\Component\HttpFoundation\Response;

interface VoteDocs extends Docs
{
    const SECTION = 'Vote';
    const HEADERS = Docs::AUTH_HEADERS;

    const DEFAULT_REQUIREMENTS_RESPONSE = [
        ['name' => 'response_id', 'dataType' => 'integer', 'description' => 'id of the response', 'requirement' => 'A valid response id']
    ];

    const DEFAULT = [
        'section'        => self::SECTION,
        'authentication' => true,
        'resource'       => true,
        'headers'        => self::HEADERS,
    ];

    const VOTE_RESPONSE = [
        'default'       => self::DEFAULT,
        'requirements'  => self::DEFAULT_REQUIREMENTS_RESPONSE,
        'statusCodes' => [
            Response::HTTP_NO_CONTENT   => self::HTTP_NO_CONTENT,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            Response::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
            Response::HTTP_CONFLICT     => self::HTTP_CONFLICT,
        ],
    ];

    const UNVOTE_RESPONSE = [
        'default'       => self::DEFAULT,
        'requirements'  => self::DEFAULT_REQUIREMENTS_RESPONSE,
        'statusCodes' => [
            Response::HTTP_NO_CONTENT   => self::HTTP_NO_CONTENT,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            Response::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
    ];
}

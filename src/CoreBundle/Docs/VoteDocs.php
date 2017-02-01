<?php

namespace CoreBundle\Docs;

use CoreBundle\Form\VoteRemarkType;
use Symfony\Component\HttpFoundation\Response;

interface VoteDocs extends Docs
{
    const SECTION = 'Vote';
    const HEADERS = Docs::AUTH_HEADERS;

    const DEFAULT_REQUIREMENTS_RESPONSE = [
        ['name' => 'response_id', 'dataType' => 'integer', 'description' => 'id of the response', 'requirement' => '\d+']
    ];

    const DEFAULT_REQUIREMENTS_REMARK = [
        ['name' => 'remark_id', 'dataType' => 'integer', 'description' => 'id of the remark', 'requirement' => '\d+']
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
            Response::HTTP_CREATED      => self::HTTP_CREATED,
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

    const VOTE_REMARK = [
        'default'       => self::DEFAULT,
        'requirements'  => self::DEFAULT_REQUIREMENTS_REMARK,
        'input'         => [
            'class'   => VoteRemarkType::class,
            'parsers' => self::INPUT_PARSER,
        ],
        'statusCodes' => [
            Response::HTTP_CREATED      => self::HTTP_CREATED,
            Response::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            Response::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
    ];

    const UNVOTE_REMARK = [
        'default'       => self::DEFAULT,
        'requirements'  => self::DEFAULT_REQUIREMENTS_REMARK,
        'parameters'    => [
            ['name' => 'type', 'dataType' => 'integer', 'required' => true, 'description' => '0 => IS_SEXIST | 1 => ALREADY_LIVED', 'format' => '[0, 1]']
        ],
        'statusCodes' => [
            Response::HTTP_NO_CONTENT   => self::HTTP_NO_CONTENT,
            Response::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN,
            Response::HTTP_NOT_FOUND    => self::HTTP_NOT_FOUND,
        ],
    ];
}

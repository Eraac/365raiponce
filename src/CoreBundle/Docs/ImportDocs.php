<?php

namespace CoreBundle\Docs;

use CoreBundle\Form\CollectionRemarkType;
use Symfony\Component\HttpFoundation\Response;

interface ImportDocs extends Docs
{
    const SECTION = 'Import';
    const HEADERS = Docs::AUTH_HEADERS;

    const DEFAULT = [
        'section'        => self::SECTION,
        'authentication' => true,
        'resource'       => true,
        'headers'        => self::HEADERS,
    ];

    const POST_REMARKS = [
        'default' => self::DEFAULT,
        'input' => [
            'class' => CollectionRemarkType::class,
            'parser' => self::INPUT_PARSER
        ],
        'statusCodes' => [
            Response::HTTP_CREATED      => self::HTTP_CREATED,
            Response::HTTP_BAD_REQUEST  => self::HTTP_BAD_REQUEST,
            Response::HTTP_UNAUTHORIZED => self::HTTP_UNAUTHORIZED,
            Response::HTTP_FORBIDDEN    => self::HTTP_FORBIDDEN
        ]
    ];
}

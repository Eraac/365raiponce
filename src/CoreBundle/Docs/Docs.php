<?php

namespace CoreBundle\Docs;

use CoreBundle\Parser\Parser;
use CoreBundle\Service\Paginator;
use Nelmio\ApiDocBundle\Parser\JmsMetadataParser;

interface Docs
{
    // Header
    const CONTENT_TYPE_HEADER    = ['name' => 'Content-Type', 'description' => 'Format of the request', 'required' => true, 'default' => 'application/json'];
    const ACCEPT_VERSION_HEADER  = ['name' => 'X-Accept-Version', 'description' => 'Version of the api', 'required' => true, 'default' => '1.0'];
    const ACCEPT_LANGUAGE_HEADER = ['name' => 'Accept-Language', 'description' => 'Language use for the response', 'required' => false, 'default' => 'en'];
    const AUTHORIZATION_HEADER   = ['name' => 'Authorization', 'description' => 'User token', 'required' => true, 'default' => 'Bearer {token}'];

    const DEFAULT_HEADERS = [
        self::CONTENT_TYPE_HEADER,
        self::ACCEPT_VERSION_HEADER,
        self::ACCEPT_LANGUAGE_HEADER
    ];

    const AUTH_HEADERS = [
        self::CONTENT_TYPE_HEADER,
        self::ACCEPT_VERSION_HEADER,
        self::AUTHORIZATION_HEADER,
        self::ACCEPT_LANGUAGE_HEADER
    ];

    // Filter
    const ORDER_ID                = ['name' => 'filter[_order][id]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by id'];
    const FILTER_PAGINATION_PAGE  = ['name' => Paginator::PAGE,  'dataType' => 'integer', 'description' => 'Page of the collection',  'default' => '1'];
    const FILTER_PAGINATION_LIMIT = ['name' => Paginator::LIMIT, 'dataType' => 'integer', 'description' => 'Limit ot items per page', 'default' => Paginator::DEFAULT_LIMIT];
    const FILTER_CREATED_BEFORE   = ['name' => 'filter[created_before]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Filter content by creation date'];
    const FILTER_CREATED_AFTER    = ['name' => 'filter[created_after]',  'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Filter content by creation date'];
    const FILTER_UPDATED_BEFORE   = ['name' => 'filter[updated_before]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}'];
    const FILTER_UPDATED_AFTER    = ['name' => 'filter[updated_after]',  'dataType' => 'integer', 'pattern' => '{unix timestamp}'];
    const FILTER_POSTED_BEFORE    = ['name' => 'filter[posted_before]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Search by posted date'];
    const FILTER_POSTED_AFTER     = ['name' => 'filter[posted_after]', 'dataType' => 'integer', 'pattern' => '{unix timestamp}', 'description' => 'Search by posted date'];
    const FILTER_EMOTION          = ['name' => 'filter[emotion]', 'dataType' => 'integer', 'description' => 'Search by emotion (id)'];
    const FILTER_THEME            = ['name' => 'filter[theme]', 'dataType' => 'integer', 'description' => 'Search by theme (id)'];
    const FILTER_REMARK           = ['name' => 'filter[remark]', 'dataType' => 'integer', 'description' => 'Search by remark (id)'];

    const ORDER_EMOTION           = ['name' => 'filter[_order][emotion]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by emotion'];
    const ORDER_THEME             = ['name' => 'filter[_order][theme]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by theme'];
    const ORDER_REMARK            = ['name' => 'filter[_order][remark]', 'pattern' => '(ASC|DESC)', 'description' => 'Order by remark'];

    // Parser
    const OUTPUT_PARSER = [
        JmsMetadataParser::class,
    ];

    const INPUT_PARSER = [
        Parser::class
    ];

    // Status code
    const HTTP_OK           = 'Returned when is successful';
    const HTTP_CREATED      = 'Returned when request has been fulfilled, resulting in the creation of a new resource';
    const HTTP_ACCEPTED     = 'Returned when request has been accepted for processing, but the processing has not been completed';
    const HTTP_NO_CONTENT   = 'Returned when is successful but no content is returned';
    const HTTP_BAD_REQUEST  = 'Returned when one or more parameters are invalid';
    const HTTP_UNAUTHORIZED = 'Returned when authentication is required';
    const HTTP_FORBIDDEN    = 'Returned when you have not the necessary permissions for the resource';
    const HTTP_NOT_FOUND    = 'Returned when resource could not be found';
    const HTTP_CONFLICT     = 'Returned when request could not be processed because of conflict in the request';
}

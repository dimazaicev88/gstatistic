<?php

namespace gstatistic\lib\Api;

use GStatistics\Exceptions\HttpException;
use GStatistics\Http\HttpClient;
use JsonException;

class Session
{

    /**
     * @throws JsonException
     * @throws HttpException
     */
    function find(
        \GStatistics\Filter\Session $filter,
        array                       $fields = [''],
        array                       $order = [''],
        string                      $orderBy = "",
        int                         $skip = 0,
        int                         $limit = 0): array
    {
        $arrayFilter = $filter->getFilter();
        $arrayFilter['fields'] = $fields;
        $arrayFilter['skip'] = $skip;
        $arrayFilter['limit'] = $limit;
        $arrayFilter['orderBy'] = $orderBy;
        $arrayFilter['order'] = $order;
        return json_decode(
            json: HttpClient::post('/api/v1/hit/filter', $arrayFilter),
            associative: true,
            flags: JSON_THROW_ON_ERROR
        );
    }
}
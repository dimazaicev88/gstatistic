<?php

namespace GStatistics\Api;

use GStatistics\Exceptions\HttpException;
use GStatistics\Http\HttpClient;

class Path
{

    /**
     * @throws \JsonException
     * @throws HttpException
     */
    public static function find(
        \GStatistics\Filter\Path $filter,
        array                    $fields = [],
        array                    $order = [],
        string                   $orderBy = "",
        int                      $skip = 0,
        int                      $limit = 0
    ): array
    {
        $arrayFilter = $filter->getFilter();
        $arrayFilter['fields'] = $fields;
        $arrayFilter['skip'] = $skip;
        $arrayFilter['limit'] = $limit;
        $arrayFilter['orderBy'] = $orderBy;
        $arrayFilter['order'] = $order;
        return json_decode(json: HttpClient::post('/api/v1/path/filter', $arrayFilter), associative: true, flags: JSON_THROW_ON_ERROR);
    }
}
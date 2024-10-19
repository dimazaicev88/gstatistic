<?php

namespace GStatistics\Api;

use GStatistics\Exceptions\HttpException;
use GStatistics\Http\HttpClient;
use JsonException;

class StatEventType
{

    /**
     *
     *
     * @param \GStatistics\Filter\StatEventType $filter
     * @param array $fields
     * @param array $order
     * @param string $orderBy
     * @param int $skip
     * @param int $limit
     * @return array
     * @throws JsonException|HttpException
     */
    public static function find(
        \GStatistics\Filter\StatEventType $filter,
        array                   $fields = [],
        array                   $order = [],
        string                  $orderBy = "",
        int                     $skip = 0,
        int                     $limit = 0
    ): array
    {
        $arrayFilter = $filter->getFilter();
        $arrayFilter['fields'] = $fields;
        $arrayFilter['skip'] = $skip;
        $arrayFilter['limit'] = $limit;
        $arrayFilter['orderBy'] = $orderBy;
        $arrayFilter['order'] = $order;
        return json_decode(json: HttpClient::post('/api/v1/stateventtype/filter', $arrayFilter), associative: true, flags: JSON_THROW_ON_ERROR);

    }
}
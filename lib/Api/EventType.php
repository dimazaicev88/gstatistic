<?php

namespace GStatistics\Api;

use GStatistics\Exceptions\HttpException;
use GStatistics\Http\HttpClient;
use JsonException;

class EventType
{

    /**
     *
     *
     * @param \GStatistics\Filter\EventType $filter
     * @param array $fields
     * @param array $order
     * @param string $orderBy
     * @param int $skip
     * @param int $limit
     * @return array
     * @throws JsonException|HttpException
     */
    public static function find(
        \GStatistics\Filter\EventType $filter,
        array     $fields = [],
        array     $order = [],
        string    $orderBy = "",
        int       $skip = 0,
        int       $limit = 0
    ): array
    {
        $arrayFilter = $filter->getFilter();
        $arrayFilter['fields'] = $fields;
        $arrayFilter['skip'] = $skip;
        $arrayFilter['limit'] = $limit;
        $arrayFilter['orderBy'] = $orderBy;
        $arrayFilter['order'] = $order;
        return json_decode(json: HttpClient::post('/api/v1/event/type/filter', $arrayFilter), associative: true, flags: JSON_THROW_ON_ERROR);

    }
}
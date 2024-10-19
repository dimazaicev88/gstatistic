<?php

namespace GStatistics\Api;

use GStatistics\Exceptions\HttpException;
use GStatistics\Http\HttpClient;
use JsonException;

class Hit
{

    /**
     * Поиск хитов
     *
     * @param \GStatistics\Filter\Hit $filter
     * @param array $fields
     * @param array $order
     * @param string $orderBy
     * @param int $skip
     * @param int $limit
     * @return array
     * @throws JsonException
     * @throws HttpException
     */
    public static function find(
        \GStatistics\Filter\Hit $filter,
        array                   $fields = [''],
        array                   $order = [''],
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
        return json_decode(json: HttpClient::post('/api/v1/hit/filter', $arrayFilter), associative: true, flags: JSON_THROW_ON_ERROR);
    }

    /**
     * @param string $uuid
     * @return array
     */
    public static function findByUuid(string $uuid): array
    {
        return [];
    }
}
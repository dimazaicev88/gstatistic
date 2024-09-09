<?php

namespace GStatistics\Api;

use Bitrix\Main\Config\Option;
use GStatistics\Http\HttpClient;

class Hit
{

    /**
     * @param \GStatistics\Filter\Hit $filter
     * @param array $fields
     * @param array $order
     * @param string $orderBy
     * @param int $skip
     * @param int $limit
     * @return array
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
        var_dump(HttpClient::post(Option::get("gstatistic", "server_url") . 'v1/hit/filter', $arrayFilter));
        return [];
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
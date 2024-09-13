<?php

namespace GStatistics\Api;

use GStatistics\Http\HttpClient;

class Phrase
{

    static function find(
        \GStatistics\Filter\Phrase $filter,
        array                    $fields = [],
        array                    $order = [],
        string                   $orderBy = "",
        int                      $skip = 0,
        int                      $limit = 0
    )
    {
        $arrayFilter = $filter->getFilter();
        $arrayFilter['fields'] = $fields;
        $arrayFilter['skip'] = $skip;
        $arrayFilter['limit'] = $limit;
        $arrayFilter['orderBy'] = $orderBy;
        $arrayFilter['order'] = $order;
        return json_decode(json: HttpClient::post('v1/phrase/filter', $arrayFilter), associative: true, flags: JSON_THROW_ON_ERROR);
    }

}
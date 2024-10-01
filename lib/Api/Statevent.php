<?php

namespace GStatistics\Api;

use GStatistics\Http\HttpClient;
use JsonException;

class StatEvent
{

    /**
     * @throws JsonException
     */
    function find(
        \GStatistics\Filter\StatEvent $filter,
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
            json: HttpClient::post('v1/statevent/filter', $arrayFilter),
            associative: true,
            flags: JSON_THROW_ON_ERROR
        );
    }

    static function getGID()
    {

    }

    public static function addCurrent(
        $event1,
        $event2 = "",
        $event3 = "",
        $money = "",
        $currency = "",
        $goto = "",
        $chargeback = "N",
        $site_id = false
    )
    {

    }

    public static function addByID(
        $eventId,
        $event3,
        $date_enter,
        $param,
        $money = "",
        $currency = "",
        $chargeback = "N"
    )
    {

    }

    public static function addByEvents(
        $event1,
        $event2,
        $event3,
        $dateEnter,
        $param,
        $money = "",
        $currency = "",
        $chargeback = "N"
    )
    {
    }

}
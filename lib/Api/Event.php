<?php

namespace GStatistics\Api;

use GStatistics\Exceptions\HttpException;
use GStatistics\Http\HttpClient;
use JsonException;

class Event
{

    /**
     * @param \GStatistics\Filter\Event $filter
     * @param array $fields
     * @param array $order
     * @param string $orderBy
     * @param int $skip
     * @param int $limit
     * @return array
     * @throws HttpException
     * @throws JsonException
     */
    function find(
        \GStatistics\Filter\Event $filter,
        array                     $fields = [''],
        array                     $order = [''],
        string                    $orderBy = "",
        int                       $skip = 0,
        int                       $limit = 0): array
    {
        $arrayFilter = $filter->getFilter();
        $arrayFilter['fields'] = $fields;
        $arrayFilter['skip'] = $skip;
        $arrayFilter['limit'] = $limit;
        $arrayFilter['orderBy'] = $orderBy;
        $arrayFilter['order'] = $order;
        return json_decode(
            json: HttpClient::post('/api/v1/events/filter', $arrayFilter),
            associative: true,
            flags: JSON_THROW_ON_ERROR
        );
    }

    static function getGID()
    {

    }

    /**
     * Добавляет событие используя текущие параметры посетителя. Если типа события
     * с идентификаторами event1, event2 не существует, то он будет
     * автоматически создан с указанными идентификаторами.
     * @param string $event1 Идентификатор типа события event1.
     * @param string $event2 Идентификатор типа события event2.
     * @param string $event3 Дополнительный параметр event3 события.
     * @param string $money Денежная сумма
     * @param string $currency Трех символьный идентификатор валюты. Идентификаторы валют задаются в модуле "Валюты".
     * @param string $goto Адрес страницы куда перешел посетитель. Как правило используется в скриптах вида /bitrix/redirect.php, перенаправляющих посетителей на другие страницы с одновременной фиксацией события.
     * @param string $chargeback Флаг отрицательной суммы. Используется когда необходимо зафиксировать событие о возврате денег (chargeback). Возможные значения:
     * Y - денежная сумма отрицательная;
     * N - денежная сумма положительная.
     * @param mixed|false $site_id ID сайта к которому будет привязано будущее событие.
     * @return void
     * @throws HttpException
     */
    public static function addCurrent(
        string $event1,
        string $event2 = "",
        string $event3 = "",
        mixed  $money = "",
        string $currency = "",
        string $goto = "",
        string $chargeback = "N",
        mixed  $site_id = false
    ): void
    {
        HttpClient::post('/api/v1/events/add-current', [
            'event1' => $event1,
            'event2' => $event2,
            'event3' => $event3,
            'money' => $money,
            'currency' => $currency,
            'goto' => $goto,
            'chargeback' => $chargeback,
            'site_id' => $site_id,
        ]);
    }

    /**
     * Добавляет событие по заданным идентификаторам типа события и специальному параметру.
     * Если типа события с идентификаторами event1,
     * event2 не существует, то он будет автоматически создан с указанными идентификаторами.
     *
     * @param string $event1 Идентификатор типа события event1.
     * @param string $event2 Идентификатор типа события event2.
     * @param string $event3 Дополнительный параметр event3 события.
     * @param string $date Дата в текущем формате.
     * @param string $gid Специальный параметр в котором закодированы все необходимые данные для добавления события.
     * @param mixed $money Денежная сумма.
     * @param string $currency Трех символьный идентификатор валюты. Идентификаторы валют задаются в модуле "Валюты".
     * @param string $chargeback Флаг отрицательной суммы. Используется когда необходимо зафиксировать событие о возврате денег (chargeback). Возможные значения:
     * Y - денежная сумма отрицательная;
     * N - денежная сумма положительная.
     * @return void
     * @throws HttpException
     */
    public static function addByEvents(
        string $event1,
        string $event2,
        string $event3,
        string $date,
        string $gid,
        mixed  $money = "",
        string $currency = "",
        string $chargeback = "N"
    ): void
    {
        HttpClient::post('/api/v1/events/add-by-events', [
            'event1' => $event1,
            'event2' => $event2,
            'event3' => $event3,
            'date' => $date,
            'gid' => $gid,
            'money' => $money,
            'currency' => $currency,
            'chargeback' => $chargeback,
        ]);
    }

    /**
     * @throws HttpException
     */
    public static function delete(int $uuid): void
    {
        HttpClient::delete('/api/v1/event/' . $uuid);
    }

    public static function add(
        int    $typeId,
        string $event3,
        string $date,
        string $gid,
        mixed  $money = "",
        string $currency = "",
        string $chargeback = "N"
    )
    {
    }

    public static function decodeGID(string $gid)
    {
    }

    public static function filter(
        \GStatistics\Filter\Event $filter,
        array                     $fields = [''],
        array                     $order = [''],
        string                    $orderBy = "",
        int                       $skip = 0,
        int                       $limit = 0
    )
    {

    }

    public static function findByGuest(
        int    $guestUuid,
        string $typeUuid = '',
        string $event3 = '',
        int    $time = 0
    )
    {

    }
}
<?php


namespace GStatistics\Api;

use GStatistics\Exceptions\AdvException;
use GStatistics\Exceptions\HttpException;
use GStatistics\Http\HttpClient;
use JsonException;

class Adv
{

    /**
     * @throws HttpException
     * @throws JsonException
     * @throws AdvException
     */
    public static function add(array $data): string
    {
        $result = json_decode(json: HttpClient::post('/api/v1/adv/add', $data), associative: true, flags: JSON_THROW_ON_ERROR);
        if (isset($result['error'])) {
            throw new AdvException($result['error']);
        }
        return $result['uuid'];
    }


    /**
     * Удаление рекламной компании
     *
     * @param string $uuid
     * @return void
     * @throws HttpException
     */
    public static function delete(string $uuid): void
    {
        HttpClient::delete('/api/v1/adv/' . $uuid);
    }

    /**
     * Поиск рекламных компаний
     *
     * @param \GStatistics\Filter\Adv $filter
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
        \GStatistics\Filter\Adv $filter,
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
        return json_decode(json: HttpClient::post('/api/v1/adv/filter', $arrayFilter), associative: true, flags: JSON_THROW_ON_ERROR);

    }

    /**
     * @param string $uuid
     * @return array
     */
    public static function findByUuid(string $uuid): array
    {
        return [];
    }

    /**
     * Возвращает список типов событий инициализированным посетителями зашедшими по определённой рекламной кампании.
     *
     * @param string $advUuid
     * @param string $by
     * @param string $order
     * @param array $arFilter
     * @return array
     */
    public static function getEventList(
        string $advUuid,
        string $by = 's_counter',
        string $order = 'desc',
        array  $arFilter = []
    ): array
    {
        return [];
    }

    public static function GetEventListByReferer($value, $arFilter): array
    {
        return [];
    }

    /**
     * Возвращает данные по трафику рекламной кампании в разрезе по дням.
     *
     * @param string $advUuid
     * @param string $by
     * @param string $order
     * @param array $arMaxMin
     * @param array $arFilter
     * @return array
     */
    public static function GetDynamicList(
        string $advUuid,
        string $by = 's_date',
        string $order = 'desc',
        array  &$arMaxMin = [],
        array  $arFilter = []
    ): array
    {
        return [];
    }

    public static function GetDropDownList($strSqlOrder = "ORDER BY REFERER1, REFERER2"): array
    {
        return [];
    }

    /**
     * Возвращает список рекламных кампаний.
     *
     * @param string $by
     * @param string $order
     * @param array $arFilter
     * @return array
     */
    public static function GetSimpleList(
        string $by = 's_referer1',
        string $order = 'asc',
        array  $arFilter = []
    ): array
    {
        return [];
    }
}
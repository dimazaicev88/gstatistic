<?php

namespace GStatistics\Api;

class Page
{

    /**
     * Возвращает данные по посещаемости указанной страницы в разрезе по дням.
     * @return array
     */
    public static function getDynamicList(): array
    {
        return [];
    }

    /**
     * @param \GStatistics\Filter\Page $filter
     * @param array $fields
     * @param array $order
     * @param string $orderBy
     * @param int $skip
     * @param int $limit
     * @return array
     */
    public static function find(
        \GStatistics\Filter\Page $filter,
        array                    $fields = [],
        array                    $order = [],
        string                   $orderBy = "",
        int                      $skip = 0,
        int                      $limit = 0
    ): array
    {
        return [];
    }

}
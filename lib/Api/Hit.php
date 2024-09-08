<?php

namespace GStatistics\Api;

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
        array     $fields = [],
        array     $order = [],
        string    $orderBy = "",
        int       $skip = 0,
        int       $limit = 0
    ): array
    {
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
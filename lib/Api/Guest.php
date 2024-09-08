<?php

namespace GStatistics\Api;


class Guest
{

    /**
     * @param \GStatistics\Filter\Guest $filter
     * @param array $fields
     * @param array $order
     * @param string $orderBy
     * @param int $skip
     * @param int $limit
     * @return array
     */
    static function find(
        \GStatistics\Filter\Guest $filter,
        array                     $fields = [],
        array                     $order = [],
        string                    $orderBy = "",
        int                       $skip = 0,
        int                       $limit = 0
    ): array
    {
        return [];
    }

    /**
     *
     * @param string $uuid
     * @return array
     */
    static function findByUuid(string $uuid): array
    {
        return [];
    }
}
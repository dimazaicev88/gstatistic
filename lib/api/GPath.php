<?php

namespace GStatistics\api;
use GStatistics\filter\PathFilter;

class GPath
{

    public static function find(
        PathFilter $filter,
        array      $fields = [],
        array      $order = [],
        string     $orderBy = "",
        int        $skip = 0,
        int        $limit = 0
    ): array
    {
        return [];
    }
}
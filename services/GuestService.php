<?php

namespace services;

use GuestFilter;
use http\HttpClient;

class GuestService
{

    private HttpClient $httpClient;

//Fields         []string         `json:"fields,omitempty"`
//Skip           int              `json:"skip,omitempty"`
//Limit          int              `json:"limit,omitempty"`
//OrderBy        string           `json:"orderBy,omitempty"`
//Order          string           `json:"order,omitempty"`

    function find(GuestFilter $guestFilter, array $fields, int $skip, $limit, $orderBy, $order)
    {

    }
}
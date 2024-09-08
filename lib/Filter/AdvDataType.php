<?php

namespace GStatistics\Filter;

enum AdvDataType: string
{
    case P = "P"; //только по прямым заходам по рекламной кампании
    case B = "B"; //только по возвратам по рекламной кампании;
    case S = "S"; //сумма по прямым заходам и возвратам.
}
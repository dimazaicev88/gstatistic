<?php

namespace gstatistic\lib\Filter;

use GStatistics\Filter\Base;
use GStatistics\Filter\Operators;

class Event extends Base
{

    /**
     * Event uuid
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function advUuid(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, "uuid");
        return $this;
    }

    /**
     * UUID типа события
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function uuidEventType(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, "uuidEventType");
        return $this;
    }

    /**
     * Название типа события;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function eventName(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, "eventName");
        return $this;
    }

    /**
     * Идентификатор event1 типа события;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function event1(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, "event1");
        return $this;
    }

    /**
     * Идентификатор event2 типа события
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function event2(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, "event2");
        return $this;
    }

    /**
     * Дополнительный параметр event3 события
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function event3(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, "event3");
        return $this;
    }

    /**
     * Время события
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function date(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, "date");
        return $this;
    }

    /**
     * Денежная сумма события
     *
     * @param Operators $operator
     * @param float $value
     * @return $this
     */
    function money(Operators $operator, float $value): Event
    {
        $this->setFilter($operator, $value, "money");
        return $this;
    }

    /**
     * Трех символьный идентификатор валюты для денежной суммы
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function currency(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, "currency");
        return $this;
    }

    /**
     * UUID сессии
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function sessionUuid(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, "sessionUuid");
        return $this;
    }

    /**
     * UUID посетителя
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function guestUuid(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, "guestUuid");
        return $this;
    }

    /**
     * UUID рекламной кампании
     *
     * @param Operators $operator
     * @param int $value
     * @return $this
     */
    function advUud(Operators $operator, int $value): Event
    {
        $this->setFilter($operator, $value, "advUud");
        return $this;
    }

    /**
     * Возврат по рекламной кампании
     *
     * @param Operators $operator
     * @param int $value
     * @return $this
     */
    function advBack(Operators $operator, int $value): Event
    {
        $this->setFilter($operator, $value, "advBack");
        return $this;
    }

    /**
     * UUID хита;
     *
     * @param Operators $operator
     * @param int $value
     * @return $this
     */
    function hitUuid(Operators $operator, int $value): Event
    {
        $this->setFilter($operator, $value, "hitUuid");
        return $this;
    }

    /**
     * ID страны посетителя сгенерировавшего событие
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function countryId(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, "countryId");
        return $this;
    }

    /**
     * Название страны посетителя сгенерировавшего событие;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function country(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, "country");
        return $this;
    }

    /**
     * Ссылающаяся страница;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function refererUrl(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, "refererUrl");
        return $this;
    }

    /**
     * UUID сайта для ссылающейся страницы;
     *
     * @param Operators $operator
     * @param float $value
     * @return $this
     */
    function refererSiteUuid(Operators $operator, float $value): Event
    {
        $this->setFilter($operator, $value, "refererSiteUuid");
        return $this;
    }

    /**
     * Страница на которой было зафиксировано событие
     *
     * @param Operators $operator
     * @param float $value
     * @return $this
     */
    function url(Operators $operator, float $value): Event
    {
        $this->setFilter($operator, $value, "url");
        return $this;
    }

    /**
     * ID сайта для страницы на которой было зафиксировано событие
     *
     * @param Operators $operator
     * @param float $value
     * @return $this
     */
    function siteId(Operators $operator, float $value): Event
    {
        $this->setFilter($operator, $value, "siteId");
        return $this;
    }

    /**
     * Страница куда был перенаправлен посетитель после фиксации события;
     *
     * @param Operators $operator
     * @param float $value
     * @return $this
     */
    function redirectUrl(Operators $operator, float $value): Event
    {
        $this->setFilter($operator, $value, "redirectUrl");
        return $this;
    }
}
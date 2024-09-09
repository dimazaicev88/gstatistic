<?php

namespace GStatistics\Filter;

class Adv extends Base
{

    /**
     * Referer1
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function referer1(Operators $operator, string $value): Adv
    {
        $this->setFilter($operator, $value, "referer1");
        return $this;
    }

    /**
     * Referer2
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function referer2(Operators $operator, string $value): Adv
    {
        $this->setFilter($operator, $value, "referer2");
        return $this;
    }


    /**
     * Посетителей на прямом заходе
     *
     * @param Operators $operator
     * @param int $value
     * @return $this
     */
    function guests(Operators $operator, int $value): Adv
    {
        $this->setFilter($operator, $value, "guests");
        return $this;
    }

    /**
     * Посетителей на возврате
     *
     * @param Operators $operator
     * @param int $value
     * @return $this
     */
    function guestsBack(Operators $operator, int $value): Adv
    {
        $this->setFilter($operator, $value, "guestsBack");
        return $this;
    }

    /**
     * Новых посетителей
     *
     * @param Operators $operator
     * @param int $value
     * @return $this
     */
    function newGuests(Operators $operator, int $value): Adv
    {
        $this->setFilter($operator, $value, "newGuests");
        return $this;
    }

    /**
     * Посетителей, добавивших сайт в "Избранное" на прямом заходе
     *
     * @param Operators $operator
     * @param int $value
     * @return $this
     */
    function favorites(Operators $operator, int $value): Adv
    {
        $this->setFilter($operator, $value, "favorites");
        return $this;
    }

    /**
     * Посетителей, добавившие сайт в "Избранное" на возврате
     *
     * @param Operators $operator
     * @param int $value
     * @return $this
     */
    function favoritesBack(Operators $operator, int $value): Adv
    {
        $this->setFilter($operator, $value, "favoritesBack");
        return $this;
    }

    /**
     * Хостов на прямом заходе
     *
     * @param Operators $operator
     * @param int $value
     * @return $this
     */
    function hosts(Operators $operator, int $value): Adv
    {
        $this->setFilter($operator, $value, "hosts");
        return $this;
    }

    /**
     * Хостов на возврате
     *
     * @param Operators $operator
     * @param int $value
     * @return $this
     */
    function hostsBack(Operators $operator, int $value): Adv
    {
        $this->setFilter($operator, $value, "hostsBack");
        return $this;
    }

    /**
     * Сессий на прямом заходе
     *
     * @param Operators $operator
     * @param int $value
     * @return $this
     */
    function sessions(Operators $operator, int $value): Adv
    {
        $this->setFilter($operator, $value, "sessions");
        return $this;
    }

    /**
     * Сессий на возврате
     *
     * @param Operators $operator
     * @param int $value
     * @return $this
     */
    function sessionsBack(Operators $operator, int $value): Adv
    {
        $this->setFilter($operator, $value, "sessionsBack");
        return $this;
    }

    /**
     * Хитов на прямом
     *
     * @param Operators $operator
     * @param int $value
     * @return $this
     */
    function hits(Operators $operator, int $value): Adv
    {
        $this->setFilter($operator, $value, "hits");
        return $this;
    }

    /**
     * Хитов на возврате
     *
     * @param Operators $operator
     * @param int $value
     * @return $this
     */
    function hitsBack(Operators $operator, int $value): Adv
    {
        $this->setFilter($operator, $value, "hitsBack");
        return $this;
    }

    /**
     * Дата для фильтрации
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    function period(Operators $operator, string $value): Adv
    {
        $this->setFilter($operator, $value, "period");
        return $this;
    }
}
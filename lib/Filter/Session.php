<?php

namespace GStatistics\Filter;

class Session extends Base
{

    /**
     * UUID сессии;
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function uuid(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'uuid');
        return $this;
    }

    /**
     * UUID посетителя;
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function guestUuid(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'guestUuid');
        return $this;
    }

    /**
     * Флаг "новый посетитель"
     *
     * @param bool $value
     * @return Session
     */
    public function isNewGuest(bool $value): Session
    {
        $this->setFilter(Operators::Eq, $value, 'isNewGuest');
        return $this;
    }

    /**
     * ID пользователя под которым последний раз был авторизован посетитель;
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function userId(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'userId');
        return $this;
    }

    /**
     * Флаг "был ли посетитель авторизован в данной сессии"
     *
     * @param Operators $operator
     * @param bool $value
     * @return Session
     */
    public function isUserAuth(Operators $operator, bool $value): Session
    {
        $this->setFilter(Operators::Eq, $value, 'isUserAuth');
        return $this;
    }

    /**
     * Флаг "был ли авторизован посетитель в данной сессии или до этого"
     *
     *
     * @param bool $value
     * @return Session
     */
    public function isRegistered(bool $value): Session
    {
        $this->setFilter(Operators::Eq, $value, 'isRegistered');
        return $this;
    }

    /**
     * Флаг "добавлял ли посетитель сайт в "Избранное""
     *
     * @param bool $value
     * @return Session
     */
    public function isFavorites(bool $value): Session
    {
        $this->setFilter(Operators::Eq, $value, 'isFavorites');
        return $this;
    }

    /**
     * Количество событий данной сессии
     *
     * @param Operators $operator
     * @param int $value
     * @return Session
     */
    public function events(Operators $operator, int $value): Session
    {
        $this->setFilter($operator, $value, 'events');
        return $this;
    }


    /**
     * Количество хитов данной сессии
     *
     * @param Operators $operator
     * @param int $value
     * @return Session
     */
    public function hits(Operators $operator, int $value): Session
    {
        $this->setFilter($operator, $value, 'hits');
        return $this;
    }

    /**
     * Приходил ли посетитель в данной сессии по какой-либо рекламной кампании
     *
     * @param bool $value
     * @return Session
     */
    public function isAdv(bool $value): Session
    {
        $this->setFilter(Operators::Eq, $value, 'isAdv');
        return $this;
    }

    /**
     * UUID рекламной кампании;
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function advUuid(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'advUuid');
        return $this;
    }

    /**
     * Флаг "возврат по рекламной кампании"
     *
     * @param Operators $operator
     * @param bool $value
     * @return Session
     */
    public function isAdvBack(Operators $operator, bool $value): Session
    {
        $this->setFilter($operator, $value, 'isAdvBack');
        return $this;
    }

    /**
     * Идентификатор referer1 рекламной кампании
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function referer1(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'referer1');
        return $this;
    }

    /**
     * Идентификатор referer2 рекламной кампании
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function referer2(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'referer2');
        return $this;
    }

    /**
     * Дополнительный параметр referer3 рекламной кампании;
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function referer3(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'referer3');
        return $this;
    }

    /**
     * Флаг "попал ли посетитель под какую либо запись стоп-листа"
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function stop(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'stop');
        return $this;
    }

    /**
     * ID записи стоп-листа под которую попал посетитель
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function stopListId(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'stopListId');
        return $this;
    }

    /**
     * ID страны посетителя
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function countryId(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'countryId');
        return $this;
    }

    /**
     * Наименование страны посетителя
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function country(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'country');
        return $this;
    }

    /**
     * IP адрес посетителя на последнем хите сессии
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function ip(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'ip');
        return $this;
    }

    /**
     * UserAgent посетителя
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function userAgent(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'userAgent');
        return $this;
    }

    /**
     * Значение интервала для поля "первого хита сессии"
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function date(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * Первая страница сессии
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function urlTo(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'urlTo');
        return $this;
    }

    /**
     * Была ли 404 ошибка на первой страницы сессии
     *
     * @param bool $value
     * @return Session
     */
    public function isUrlTo404(bool $value): Session
    {
        $this->setFilter(Operators::Eq, $value, 'isUrlTo404');
        return $this;
    }

    /**
     * ID сайта на первом хите сессии
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function firstSiteId(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'firstSiteId');
        return $this;
    }


    /**
     * Последняя страница сессии
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function urlLast(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'urlLast');
        return $this;
    }


    /**
     * Была ли 404 ошибка на последней страницы сессии
     *
     * @param bool $value
     * @return Session
     */
    public function isUrlLast404(bool $value): Session
    {
        $this->setFilter(Operators::Eq, $value, 'isUrlLast404');
        return $this;
    }

    /**
     * ID сайта на последнем хите сессии
     *
     * @param Operators $operator
     * @param string $value
     * @return Session
     */
    public function lastSiteId(Operators $operator, string $value): Session
    {
        $this->setFilter($operator, $value, 'lastSiteId');
        return $this;
    }
}
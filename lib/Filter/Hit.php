<?php

namespace GStatistics\Filter;

class Hit extends Base
{

    /**
     * ID - UUID хита;
     * @param Operators $operator
     * @param string $value
     * @return Hit
     */
    function uuid(Operators $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'uuid');
        return $this;
    }

    /**
     * Guest UUID посетителя
     *
     * @param Operators $operator
     * @param string $value
     * @return Hit
     */
    function guestUuid(Operators $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'guestUuid');
        return $this;
    }

    /**
     * Флаг "новый посетитель"
     *
     * @param bool $value
     * @return Hit
     */
    function isNewGuest(bool $value): Hit
    {
        $this->setFilter(Operators::Eq, $value, 'isNewGuest');
        return $this;
    }

    /**
     * UUID сессии
     * @param Operators $operator
     * @param string $value
     * @return Hit
     */
    function sessionUuid(Operators $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'sessionUuid');
        return $this;
    }

    /**
     * UUID записи стоп - листа под которую попал посетитель(если это имело место)
     *
     * @param Operators $operator
     * @param string $value
     * @return Hit
     */
    function stopListUuid(Operators $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'stopListUuid');
        return $this;
    }

    /**
     * Страница хита
     *
     * @param Operators $operator
     * @param string $value
     * @return Hit
     */
    function url(Operators $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'url');
        return $this;
    }

    /**
     * Была ли 404 ошибка на странице хита
     *
     * @param bool $value
     * @return Hit
     */
    function isUrl404(bool $value): Hit
    {
        $this->setFilter(Operators::Eq, $value, 'isUrl404');
        return $this;
    }

    /**
     * ID пользователя под которым был авторизован посетитель в момент хита или до него;
     *
     * @param Operators $operator
     * @param int $value
     * @return Hit
     */
    function userId(Operators $operator, int $value): Hit
    {
        $this->setFilter($operator, $value, 'userId');
        return $this;
    }

    /**
     * Флаг "был ли авторизован посетитель в момент хита или до этого"
     *
     * @param bool $value
     * @return Hit
     */
    function isRegistered(bool $value): Hit
    {
        $this->setFilter(Operators::Eq, $value, 'isRegistered');
        return $this;
    }

    /**
     * Значение интервала даты хита
     *
     * @param Operators $operator
     * @param string $value
     * @return Hit
     */
    function date(Operators $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * IP адрес посетителя в момент хита
     *
     * @param Operators $operator
     * @param string $value
     * @return Hit
     */
    function ip(Operators $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'ip');
        return $this;
    }

    /**
     * UserAgent посетителя в момент хита
     *
     * @param Operators $operator
     * @param string $value
     * @return Hit
     */
    function userAgent(Operators $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'userAgent');
        return $this;
    }

    /**
     * ID страны посетителя в момент хита
     *
     * @param Operators $operator
     * @param string $value
     * @return Hit
     */
    function countryId(Operators $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'countryId');
        return $this;
    }

    /**
     * Название страны
     *
     * @param Operators $operator
     * @param string $value
     * @return Hit
     */
    function country(Operators $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'country');
        return $this;
    }

    /**
     * Содержимое Cookie в момент хита
     *
     * @param Operators $operator
     * @param string $value
     * @return Hit
     */
    function cookie(Operators $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'cookie');
        return $this;
    }

    /**
     * Содержимое Cookie в момент хита
     *
     * @param bool $value
     * @return Hit
     */
    function isStop(bool $value): Hit
    {
        $this->setFilter(Operators::Eq, $value, 'isStop');
        return $this;
    }

    /**
     * ID сайта
     *
     * @param Operators $operator
     * @param bool $value
     * @return Hit
     */
    function siteId(Operators $operator, bool $value): Hit
    {
        $this->setFilter($operator, $value, 'siteId');
        return $this;
    }
}
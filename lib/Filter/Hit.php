<?php

namespace GStatistics\Filter;

class Hit extends Base
{

    /**
     * ID - UUID хита;
     * @param Operator $operator
     * @param string $value
     * @return Hit
     */
    function uuid(Operator $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'uuid');
        return $this;
    }

    /**
     * Guest UUID посетителя
     *
     * @param Operator $operator
     * @param string $value
     * @return Hit
     */
    function guestUuid(Operator $operator, string $value): Hit
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
        $this->setFilter(Operator::Eq, $value, 'isNewGuest');
        return $this;
    }

    /**
     * UUID сессии
     * @param Operator $operator
     * @param string $value
     * @return Hit
     */
    function sessionUuid(Operator $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'sessionUuid');
        return $this;
    }

    /**
     * UUID записи стоп - листа под которую попал посетитель(если это имело место)
     *
     * @param Operator $operator
     * @param string $value
     * @return Hit
     */
    function stopListUuid(Operator $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'stopListUuid');
        return $this;
    }

    /**
     * Страница хита
     *
     * @param Operator $operator
     * @param string $value
     * @return Hit
     */
    function url(Operator $operator, string $value): Hit
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
        $this->setFilter(Operator::Eq, $value, 'isUrl404');
        return $this;
    }

    /**
     * ID пользователя под которым был авторизован посетитель в момент хита или до него;
     *
     * @param Operator $operator
     * @param int $value
     * @return Hit
     */
    function userId(Operator $operator, int $value): Hit
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
        $this->setFilter(Operator::Eq, $value, 'isRegistered');
        return $this;
    }

    /**
     * Значение интервала даты хита
     *
     * @param Operator $operator
     * @param string $value
     * @return Hit
     */
    function date(Operator $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * IP адрес посетителя в момент хита
     *
     * @param Operator $operator
     * @param string $value
     * @return Hit
     */
    function ip(Operator $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'ip');
        return $this;
    }

    /**
     * UserAgent посетителя в момент хита
     *
     * @param Operator $operator
     * @param string $value
     * @return Hit
     */
    function userAgent(Operator $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'userAgent');
        return $this;
    }

    /**
     * ID страны посетителя в момент хита
     *
     * @param Operator $operator
     * @param string $value
     * @return Hit
     */
    function countryId(Operator $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'countryId');
        return $this;
    }

    /**
     * Название страны
     *
     * @param Operator $operator
     * @param string $value
     * @return Hit
     */
    function country(Operator $operator, string $value): Hit
    {
        $this->setFilter($operator, $value, 'country');
        return $this;
    }

    /**
     * Содержимое Cookie в момент хита
     *
     * @param Operator $operator
     * @param string $value
     * @return Hit
     */
    function cookie(Operator $operator, string $value): Hit
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
        $this->setFilter(Operator::Eq, $value, 'isStop');
        return $this;
    }

    /**
     * ID сайта
     *
     * @param Operator $operator
     * @param bool $value
     * @return Hit
     */
    function siteId(Operator $operator, bool $value): Hit
    {
        $this->setFilter($operator, $value, 'siteId');
        return $this;
    }
}
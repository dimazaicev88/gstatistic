<?php

namespace GStatistics\Filter;

class Page extends Base
{

    /**
     * Значение для интервала даты за которую необходимо получить данные
     *
     * @param Operators $operator
     * @param string $value
     * @return Page
     */
    public function date(Operators $operator, string $value): Page
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * Флаг "показывать только каталоги или только страницы", возможные значения:
     * true - в результирующем списке должны быть только каталоги;
     * false - в результирующем списке должны быть только страницы.
     * @param bool $value
     * @return Page
     */
    public function isDir(bool $value): Page
    {
        $this->setFilter(Operators::Eq, $value, 'isDir');
        return $this;
    }

    /**
     * Полный путь к странице (каталогу) для которой необходимо вывести данные
     *
     * @param Operators $operator
     * @param string $value
     * @return Page
     */
    public function url(Operators $operator, string $value): Page
    {
        $this->setFilter($operator, $value, 'url');
        return $this;
    }

    /**
     * Была ли 404 ошибка на странице, возможные значения:
     *
     * @param bool $value
     * @return Page
     */
    public function isUrl404(bool $value): Page
    {
        $this->setFilter(Operators::Eq, $value, 'isUrl404');
        return $this;
    }

    /**
     * UUID рекламной кампании (РК), данное поле позволяет отфильтровать только те страницы (каталоги) которые были открыты
     * только посетителями по данной РК и соответственно получить данные по посещаемости страницы (каталога) url только этих посетителей;
     *
     * @param Operators $operator
     * @param bool $value
     * @return Page
     */
    public function advUuid(Operators $operator, bool $value): Page
    {
        $this->setFilter($operator, $value, 'advUuid');
        return $this;
    }

    /**
     * Флаг типа данных для рекламной кампании, возможные значения:
     *
     * P - только по прямым заходам по рекламной кампании;
     * B - только по возвратам по рекламной кампании;
     * S - сумма по прямым заходам и возвратам.
     *
     * @param Operators $operator
     * @param AdvDataType $value
     * @return Page
     */
    public function advDataType(Operators $operator, AdvDataType $value): Page
    {
        $this->setFilter($operator, $value->value, 'advDataType');
        return $this;
    }

    /**
     * ID сайта
     *
     * @param Operators $operator
     * @param bool $value
     * @return Page
     */
    public function siteId(Operators $operator, bool $value): Page
    {
        $this->setFilter($operator, $value, 'siteId');
        return $this;
    }
}
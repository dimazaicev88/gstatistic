<?php

namespace GStatistics\Filter;

class Path extends Base
{

    /**
     * ID отрезка пути;
     *
     * @param Operators $operator
     * @param string $value
     * @return Path
     */
    public function pathId(Operators $operator, string $value): Path
    {
        $this->setFilter($operator, $value, 'pathId');
        return $this;
    }

    /**
     * Значение для интервала даты
     *
     * @param Operators $operator
     * @param string $value
     * @return Path
     */
    public function date(Operators $operator, string $value): Path
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * Первая страница пути;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function firstPage(Operators $operator, string $value): Path
    {
        $this->setFilter($operator, $value, 'firstPage');
        return $this;
    }

    /**
     * ID сайта первой страницы пути;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function firstPageSiteId(Operators $operator, string $value): Path
    {
        $this->setFilter($operator, $value, 'firstPageSiteId');
        return $this;
    }

    /**
     * Была ли 404 ошибка на первой странице пути
     *
     * @param Operators $operator
     * @param bool $value
     * @return $this
     */
    public function isFirstPage404(Operators $operator, bool $value): Path
    {
        $this->setFilter($operator, $value, 'isFirstPage404');
        return $this;
    }


    /**
     * Последняя страница пути;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function lastPage(Operators $operator, string $value): Path
    {
        $this->setFilter($operator, $value, 'lastPage');
        return $this;
    }

    /**
     * ID сайта последней страницы пути;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function lastPageSiteId(Operators $operator, string $value): Path
    {
        $this->setFilter($operator, $value, 'lastPageSiteId');
        return $this;
    }

    /**
     * Была ли 404 ошибка на последней странице пути
     *
     * @param bool $isLastPage404
     * @return $this
     */
    public function isLastPage404(bool $isLastPage404): Path
    {
        $this->setFilter(Operators::Eq, $isLastPage404, 'isLastPage404');
        return $this;
    }

    /**
     * Произвольная страница пути
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function page(Operators $operator, string $value): Path
    {
        $this->setFilter($operator, $value, 'page');
        return $this;
    }

    /**
     * ID сайта произвольной страницы пути
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function pageSiteId(Operators $operator, string $value): Path
    {
        $this->setFilter($operator, $value, 'pageSiteId');
        return $this;
    }

    /**
     * Была ли 404 ошибка на произвольной странице пути
     *
     * @param bool $value
     * @return $this
     */
    public function isPage404(bool $value): Path
    {
        $this->setFilter(Operators::Eq, $value, 'isPage404');
        return $this;
    }

    /**
     * UUID рекламной кампании, по посетителям которой надо получить данные;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function advUuid(Operators $operator, string $value): Path
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
     * @return $this
     */
    public function advDataType(Operators $operator, AdvDataType $value): Path
    {
        $this->setFilter($operator, $value->value, 'advDataType');
        return $this;
    }

    /**
     * Значение интервала для поля "количество страниц в пути";
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function steps(Operators $operator, string $value): Path
    {
        $this->setFilter($operator, $value, 'steps');
        return $this;
    }
}
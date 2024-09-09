<?php

namespace GStatistics\Filter;

class Referer extends Base
{

    /**
     * ID записи;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function uuid(Operators $operator, string $value): Referer
    {
        $this->setFilter($operator, $value, 'uuid');
        return $this;
    }

    /**
     * UUID сессии;
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function sessionUuid(Operators $operator, string $value): Referer
    {
        $this->setFilter($operator, $value, 'sessionUuid');
        return $this;
    }

    /**
     * Значение интервала для поля "дата"
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function date(Operators $operator, string $value): Referer
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * Протокол ссылающейся страницы;
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function fromProtocol(Operators $operator, string $value): Referer
    {
        $this->setFilter($operator, $value, 'fromProtocol');
        return $this;
    }

    /**
     * Домен ссылающейся страницы;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function fromDomain(Operators $operator, string $value): Referer
    {
        $this->setFilter($operator, $value, 'fromDomain');
        return $this;
    }

    /**
     * Ссылающаяся страница;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function fromPage(Operators $operator, string $value): Referer
    {
        $this->setFilter($operator, $value, 'fromPage');
        return $this;
    }

    /**
     * Протокол + домен + ссылающаяся страница;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function from(Operators $operator, string $value): Referer
    {
        $this->setFilter($operator, $value, 'from');
        return $this;
    }

    /**
     *Страница на которую пришли
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function to(Operators $operator, string $value): Referer
    {
        $this->setFilter($operator, $value, 'to');
        return $this;
    }

    /**
     * Была ли 404 ошибка на странице, на которую пришли
     *
     * @param bool $value
     * @return $this
     */
    public function to404(bool $value): Referer
    {
        $this->setFilter(Operators::Eq, $value, 'to404');
        return $this;
    }


    /**
     * ID сайта на который пришли
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function siteId(Operators $operator, string $value): Referer
    {
        $this->setFilter($operator, $value, 'siteId');
        return $this;
    }

//GROUP - группировка результирующего списка;
//возможные значения:
//S - группировка по ссылающемуся домену (сайту);
//U - группировка по ссылающейся странице.

}
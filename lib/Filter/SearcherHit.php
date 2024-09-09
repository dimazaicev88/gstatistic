<?php

namespace GStatistics\Filter;

class SearcherHit extends Base
{

    /**
     * UUID хита;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function hitUuid(Operators $operator, string $value): SearcherHit
    {
        $this->setFilter($operator, $value, 'hitUuid');
        return $this;
    }

    /**
     * UUID поисковой системы;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function searcherUuid(Operators $operator, string $value): SearcherHit
    {
        $this->setFilter($operator, $value, 'searcherUuid');
        return $this;
    }


    /**
     * URL* - адрес проиндексированной страницы;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function url(Operators $operator, string $value): SearcherHit
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * Была ли 404 ошибка на проиндексированной странице
     *
     * @param bool $date
     * @return $this
     */
    public function isUrl404(bool $date): SearcherHit
    {
        $this->setFilter(Operators::Eq, $date, 'date');
        return $this;
    }

    /**
     * Название поисковой системы;
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function searcher(Operators $operator, string $value): SearcherHit
    {
        $this->setFilter($operator, $value, 'searcher');
        return $this;
    }

    /**
     * Значение интервала для поля "дата"
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function date(Operators $operator, string $value): SearcherHit
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * IP адрес поисковой системы
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function ip(Operators $operator, string $value): SearcherHit
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * UserAgent поисковой системы
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function userAgent(Operators $operator, string $value): SearcherHit
    {
        $this->setFilter($operator, $value, 'userAgent');
        return $this;
    }

    /**
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function siteId(Operators $operator, string $value): SearcherHit
    {
        $this->setFilter($operator, $value, 'siteId');
        return $this;
    }
}
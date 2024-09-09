<?php


namespace GStatistics\Filter;

class Searcher extends Base
{

    /**
     * UUID поисковой системы;
     *
     * @param Operators $operator
     * @param string $value
     * @return Searcher
     */
    public function uuid(Operators $operator, string $value): Searcher
    {
        $this->setFilter($operator, $value, 'uuid');
        return $this;
    }

    /**
     * Флаг активности:
     *
     * @param Operators $operator
     * @param bool $value
     * @return $this
     */
    public function active(Operators $operator, bool $value): Searcher
    {
        $this->setFilter($operator, $value, 'active');
        return $this;
    }

    /**
     * Флаг "сохранять хиты поисковой системы", возможные значения
     *
     * @param Operators $operator
     * @param bool $value
     * @return Searcher
     */
    public function saveStatistic(Operators $operator, bool $value): Searcher
    {
        $this->setFilter($operator, $value, 'saveStatistic');
        return $this;
    }

    /**
     * Количество хитов;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function hits(Operators $operator, string $value): Searcher
    {
        $this->setFilter($operator, $value, 'hits');
        return $this;
    }


    /**
     * Начальное значение для произвольного периода
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function period(Operators $operator, string $value): Searcher
    {
        $this->setFilter($operator, $value, 'period');
        return $this;
    }

    /**
     * Наименование поисковой системы;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function name(Operators $operator, string $value): Searcher
    {
        $this->setFilter($operator, $value, 'name');
        return $this;
    }

    /**
     * UserAgent поисковой системы;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function userAgent(Operators $operator, string $value): Searcher
    {
        $this->setFilter($operator, $value, 'userAgent');
        return $this;
    }

}
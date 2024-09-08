<?php


namespace GStatistics\Filter;

class Searcher extends Base
{

    /**
     * UUID поисковой системы;
     *
     * @param Operator $operator
     * @param string $value
     * @return Searcher
     */
    public function uuid(Operator $operator, string $value): Searcher
    {
        $this->setFilter($operator, $value, 'uuid');
        return $this;
    }

    /**
     * Флаг активности:
     *
     * @param Operator $operator
     * @param bool $value
     * @return $this
     */
    public function active(Operator $operator, bool $value): Searcher
    {
        $this->setFilter($operator, $value, 'active');
        return $this;
    }

    /**
     * Флаг "сохранять хиты поисковой системы", возможные значения
     *
     * @param Operator $operator
     * @param bool $value
     * @return Searcher
     */
    public function saveStatistic(Operator $operator, bool $value): Searcher
    {
        $this->setFilter($operator, $value, 'saveStatistic');
        return $this;
    }

    /**
     * Количество хитов;
     *
     * @param Operator $operator
     * @param string $value
     * @return $this
     */
    public function hits(Operator $operator, string $value): Searcher
    {
        $this->setFilter($operator, $value, 'hits');
        return $this;
    }


    /**
     * Начальное значение для произвольного периода
     *
     * @param Operator $operator
     * @param string $value
     * @return $this
     */
    public function period(Operator $operator, string $value): Searcher
    {
        $this->setFilter($operator, $value, 'period');
        return $this;
    }

    /**
     * Наименование поисковой системы;
     *
     * @param Operator $operator
     * @param string $value
     * @return $this
     */
    public function name(Operator $operator, string $value): Searcher
    {
        $this->setFilter($operator, $value, 'name');
        return $this;
    }

    /**
     * UserAgent поисковой системы;
     *
     * @param Operator $operator
     * @param string $value
     * @return $this
     */
    public function userAgent(Operator $operator, string $value): Searcher
    {
        $this->setFilter($operator, $value, 'userAgent');
        return $this;
    }

}
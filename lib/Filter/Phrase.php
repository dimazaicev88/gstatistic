<?php


namespace GStatistics\Filter;

class Phrase extends Base
{


    /**
     * UUID записи;
     *
     * @param Operators $operator
     * @param string $value
     * @return Phrase
     */
    public function uuid(Operators $operator, string $value): Phrase
    {
        $this->setFilter($operator, $value, 'uuid');
        return $this;
    }

    /**
     * UUID сессии;
     *
     * @param Operators $operator
     * @param string $value
     * @return Phrase
     */
    public function sessionUuid(Operators $operator, string $value): Phrase
    {
        $this->setFilter($operator, $value, 'sessionUuid');
        return $this;
    }

    /**
     * UUID поисковой системы;
     *
     * @param Operators $operator
     * @param string $value
     * @return Phrase
     */
    public function searcherUuid(Operators $operator, string $value): Phrase
    {
        $this->setFilter($operator, $value, 'searcherUuid');
        return $this;
    }

    /**
     * UUID записи из таблицы ссылающихся сайтов (страниц);
     *
     * @param Operators $operator
     * @param string $value
     * @return Phrase
     */
    public function refererUuid(Operators $operator, string $value): Phrase
    {
        $this->setFilter($operator, $value, 'refererUuid');
        return $this;
    }

    /**
     * Название поисковой системы;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function searcher(Operators $operator, string $value): Phrase
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
    public function date(Operators $operator, string $value): Phrase
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * Поисковая фраза;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function phrase(Operators $operator, string $value): Phrase
    {
        $this->setFilter($operator, $value, 'phrase');
        return $this;
    }

    /**
     * Страница на которую пришли;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function to(Operators $operator, string $value): Phrase
    {
        $this->setFilter($operator, $value, 'to');
        return $this;
    }

    /**
     * Была ли 404 ошибка на странице на которую пришли
     *
     * @param bool $value
     * @return $this
     */
    public function to404(bool $value): Phrase
    {
        $this->setFilter(Operators::Eq, $value, 'to404');
        return $this;
    }

    /**
     * ID сайта, на который пришли;
     *
     * @param Operators $operator
     * @param string $value
     * @return $this
     */
    public function siteId(Operators $operator, string $value): Phrase
    {
        $this->setFilter($operator, $value, 'siteId');
        return $this;
    }
}
//GROUP - группировка результирующего списка, возможные значения:
//P - группировка по поисковой фразе;
//S - группировка по поисковой системе.
//    public function group(Operator $operator, string $date): Phrase
//    {
//        $this->setFilter($operator, $date, 'date');
//        return $this;
//    }
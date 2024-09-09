<?php


namespace GStatistics\Filter;

class StatEventType extends Base
{

    /**
     * UUID типа события
     *
     * @param Operators $operator
     * @param string $value
     * @return StatEventType
     */
    public function uuid(Operators $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'uuid');
        return $this;
    }

    /**
     * Идентификатор event1 типа события
     *
     * @param Operators $operator
     * @param string $value
     * @return StatEventType
     */
    public function event1(Operators $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'event1');
        return $this;
    }

    /**
     * Идентификатор event2 типа события
     *
     * @param Operators $operator
     * @param string $value
     * @return StatEventType
     */
    public function event2(Operators $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'event2');
        return $this;
    }

    /**
     * Название типа события
     *
     * @param Operators $operator
     * @param string $value
     * @return StatEventType
     */
    public function name(Operators $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'name');
        return $this;
    }

    /**
     * Описание типа события
     *
     * @param Operators $operator
     * @param string $value
     * @return StatEventType
     */
    public function description(Operators $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'description');
        return $this;
    }

    /**
     * Дата первого события данного типа
     *
     * @param Operators $operator
     * @param string $value
     * @return StatEventType
     */
    public function dateEnter(Operators $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'dateEnter');
        return $this;
    }

    /**
     * Дата последнего события данного типа
     *
     * @param Operators $operator
     * @param string $value
     * @return StatEventType
     */
    public function dateLast(Operators $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * Значение для произвольного периода
     *
     * @param Operators $operator
     * @param string $value
     * @return StatEventType
     */
    public function datePeriod(Operators $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * Суммарное количество событий данного типа
     *
     * @param Operators $operator
     * @param string $value
     * @return StatEventType
     */
    public function countEvent(Operators $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'countEvent');
        return $this;
    }

    /**
     * Флаг включать ли статистику по данному типу события в отчет по рекламным кампаниям, возможные значения
     *
     * @param bool $value
     * @return StatEventType
     */
    public function advVisible(bool $value): StatEventType
    {
        $this->setFilter(Operators::Eq, $value, 'advVisible');
        return $this;
    }

    /**
     * Количество дней отведенное для хранения событий данного типа
     *
     * @param Operators $operator
     * @param int $value
     * @return StatEventType
     */
    public function keepDays(Operators $operator, int $value): StatEventType
    {
        $this->setFilter($operator, $value, 'keepDays');
        return $this;
    }

    /**
     * Количество дней отведенное для хранения статистики по данному типу события в разрезе по дням
     *
     * @param Operators $operator
     * @param int $value
     * @return StatEventType
     */
    public function dynamicKeepDays(Operators $operator, int $value): StatEventType
    {
        $this->setFilter($operator, $value, 'dynamicKeepDays');
        return $this;
    }

    /**
     * Суммарная денежная сумма для данного типа событий
     *
     * @param Operators $operator
     * @param string $value
     * @return StatEventType
     */
    public function money(Operators $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'money');
        return $this;
    }

    /**
     * Трех символьный идентификатор валюты для денежной суммы
     *
     * @param Operators $operator
     * @param string $value
     * @return StatEventType
     */
    public function currency(Operators $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'currency');
        return $this;
    }
//GROUP - группировка результирующего списка, возможные значения:
//event1 - группировка по event1;
//event2 - группировка по event2.

}
<?php


namespace GStatistics\Filter;

class StatEventType extends Base
{

    /**
     * UUID типа события
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEventType
     */
    public function uuid(Operator $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'uuid');
        return $this;
    }

    /**
     * Идентификатор event1 типа события
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEventType
     */
    public function event1(Operator $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'event1');
        return $this;
    }

    /**
     * Идентификатор event2 типа события
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEventType
     */
    public function event2(Operator $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'event2');
        return $this;
    }

    /**
     * Название типа события
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEventType
     */
    public function name(Operator $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'name');
        return $this;
    }

    /**
     * Описание типа события
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEventType
     */
    public function description(Operator $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'description');
        return $this;
    }

    /**
     * Дата первого события данного типа
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEventType
     */
    public function dateEnter(Operator $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'dateEnter');
        return $this;
    }

    /**
     * Дата последнего события данного типа
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEventType
     */
    public function dateLast(Operator $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * Значение для произвольного периода
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEventType
     */
    public function datePeriod(Operator $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * Суммарное количество событий данного типа
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEventType
     */
    public function countEvent(Operator $operator, string $value): StatEventType
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
        $this->setFilter(Operator::Eq, $value, 'advVisible');
        return $this;
    }

    /**
     * Количество дней отведенное для хранения событий данного типа
     *
     * @param Operator $operator
     * @param int $value
     * @return StatEventType
     */
    public function keepDays(Operator $operator, int $value): StatEventType
    {
        $this->setFilter($operator, $value, 'keepDays');
        return $this;
    }

    /**
     * Количество дней отведенное для хранения статистики по данному типу события в разрезе по дням
     *
     * @param Operator $operator
     * @param int $value
     * @return StatEventType
     */
    public function dynamicKeepDays(Operator $operator, int $value): StatEventType
    {
        $this->setFilter($operator, $value, 'dynamicKeepDays');
        return $this;
    }

    /**
     * Суммарная денежная сумма для данного типа событий
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEventType
     */
    public function money(Operator $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'money');
        return $this;
    }

    /**
     * Трех символьный идентификатор валюты для денежной суммы
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEventType
     */
    public function currency(Operator $operator, string $value): StatEventType
    {
        $this->setFilter($operator, $value, 'currency');
        return $this;
    }
//GROUP - группировка результирующего списка, возможные значения:
//event1 - группировка по event1;
//event2 - группировка по event2.

}
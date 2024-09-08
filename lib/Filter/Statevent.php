<?php


namespace GStatistics\Filter;

class StatEvent extends Base
{

    /**
     * UUID события
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function uuid(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'uuid');
        return $this;
    }

    /**
     * UUID типа события
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function eventUuid(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'eventUuid');
        return $this;
    }

    /**
     *Название типа события
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function eventName(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'eventName');
        return $this;
    }


    /**
     * Идентификатор event1 типа события
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function event1(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'event1');
        return $this;
    }


    /**
     * Идентификатор event2 типа события
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function event2(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'event2');
        return $this;
    }

    /**
     * Дополнительный параметр event3 события
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function event3(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'event3');
        return $this;
    }

    /**
     * Время события
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function date(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * Денежная сумма события
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function money(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'money');
        return $this;
    }

    /**
     * Трех символьный идентификатор валюты для денежной суммы
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function currency(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'currency');
        return $this;
    }

    /**
     * UUID сессии
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function sessionUuid(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'sessionUuid');
        return $this;
    }

    /**
     * UUID посетителя
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function guestUuid(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'guestUuid');
        return $this;
    }

    /**
     * UUID рекламной кампании
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function advUuid(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'advUuid');
        return $this;
    }

    /**
     * Флаг "возврат по рекламной кампании", возможные значения
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function advBack(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'advBack');
        return $this;
    }

    /**
     * UUID хита
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function hitUuid(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'hitUuid');
        return $this;
    }

    /**
     * ID страны посетителя сгенерировавшего событие
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function countryId(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'countryId');
        return $this;
    }

    /**
     * Название страны посетителя сгенерировавшего событие
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function country(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'country');
        return $this;
    }

    /**
     * Ссылающаяся страница
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function refererUrl(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'refererUrl');
        return $this;
    }

    /**
     * ID сайта для ссылающейся страницы
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function refererSiteId(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'refererSiteId');
        return $this;
    }

    /**
     * Страница на которой было зафиксировано событие
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function url(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'url');
        return $this;
    }

    /**
     * ID сайта для страницы на которой было зафиксировано событие
     *
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function siteId(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'siteId');
        return $this;
    }

    /**
     *  Страница куда был перенаправлен посетитель после фиксации события
     * @param Operator $operator
     * @param string $value
     * @return StatEvent
     */
    public function redirectUrl(Operator $operator, string $value): StatEvent
    {
        $this->setFilter($operator, $value, 'redirectUrl');
        return $this;
    }

}
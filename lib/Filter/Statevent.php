<?php


namespace GStatistics\Filter;

class Event extends Base
{

    /**
     * UUID события
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function uuid(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'uuid');
        return $this;
    }

    /**
     * UUID типа события
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function eventUuid(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'eventUuid');
        return $this;
    }

    /**
     *Название типа события
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function eventName(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'eventName');
        return $this;
    }


    /**
     * Идентификатор event1 типа события
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function event1(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'event1');
        return $this;
    }


    /**
     * Идентификатор event2 типа события
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function event2(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'event2');
        return $this;
    }

    /**
     * Дополнительный параметр event3 события
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function event3(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'event3');
        return $this;
    }

    /**
     * Время события
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function date(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'date');
        return $this;
    }

    /**
     * Денежная сумма события
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function money(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'money');
        return $this;
    }

    /**
     * Трех символьный идентификатор валюты для денежной суммы
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function currency(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'currency');
        return $this;
    }

    /**
     * UUID сессии
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function sessionUuid(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'sessionUuid');
        return $this;
    }

    /**
     * UUID посетителя
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function guestUuid(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'guestUuid');
        return $this;
    }

    /**
     * UUID рекламной кампании
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function advUuid(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'advUuid');
        return $this;
    }

    /**
     * Флаг "возврат по рекламной кампании", возможные значения
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function advBack(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'advBack');
        return $this;
    }

    /**
     * UUID хита
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function hitUuid(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'hitUuid');
        return $this;
    }

    /**
     * ID страны посетителя сгенерировавшего событие
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function countryId(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'countryId');
        return $this;
    }

    /**
     * Название страны посетителя сгенерировавшего событие
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function country(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'country');
        return $this;
    }

    /**
     * Ссылающаяся страница
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function refererUrl(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'refererUrl');
        return $this;
    }

    /**
     * ID сайта для ссылающейся страницы
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function refererSiteId(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'refererSiteId');
        return $this;
    }

    /**
     * Страница на которой было зафиксировано событие
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function url(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'url');
        return $this;
    }

    /**
     * ID сайта для страницы на которой было зафиксировано событие
     *
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function siteId(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'siteId');
        return $this;
    }

    /**
     *  Страница куда был перенаправлен посетитель после фиксации события
     * @param Operators $operator
     * @param string $value
     * @return Event
     */
    public function redirectUrl(Operators $operator, string $value): Event
    {
        $this->setFilter($operator, $value, 'redirectUrl');
        return $this;
    }

}
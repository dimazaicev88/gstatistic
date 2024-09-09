<?php

namespace GStatistics\Filter;

class StopList extends Base
{

    /**
     * UUID записи стоп-листа
     *
     * @param Operators $operator
     * @param string $value
     * @return StopList
     */
    public function uuid(Operators $operator, string $value): StopList
    {
        $this->setFilter($operator, $value, 'uuid');
        return $this;
    }

    /**
     * Время начала активности записи
     *
     * @param Operators $operator
     * @param string $value
     * @return StopList
     */
    public function dateStart(Operators $operator, string $value): StopList
    {
        $this->setFilter($operator, $value, 'dateStart');
        return $this;
    }

    /**
     * Время окончания активности записи
     *
     * @param Operators $operator
     * @param string $value
     * @return StopList
     */
    public function dateEnd(Operators $operator, string $value): StopList
    {
        $this->setFilter($operator, $value, 'dateEnd');
        return $this;
    }


    /**
     * Флаг активности записи
     *
     * @param bool $value
     * @return StopList
     */
    public function active(bool $value): StopList
    {
        $this->setFilter(Operators::Eq, $value, 'active');
        return $this;
    }

    /**
     * Флаг необходимости сохранения статистики по посетителю попавшему в стоп-лист, воможные значения
     *
     * @param bool $value
     * @return StopList
     */
    public function saveStatistic(bool $value): StopList
    {
        $this->setFilter(Operators::Eq, $value, 'saveStatistic');
        return $this;
    }

    /**
     * Октет 1 IP адреса
     *
     * @param Operators $operator
     * @param string $value
     * @return StopList
     */
    public function ip1(Operators $operator, string $value): StopList
    {
        $this->setFilter($operator, $value, 'ip1');
        return $this;
    }

    /**
     * Октет 2 IP адреса
     *
     * @param Operators $operator
     * @param string $value
     * @return StopList
     */
    public function ip2(Operators $operator, string $value): StopList
    {
        $this->setFilter($operator, $value, 'ip2');
        return $this;
    }

    /**
     * Октет 3 IP адреса
     *
     * @param Operators $operator
     * @param string $value
     * @return StopList
     */
    public function ip3(Operators $operator, string $value): StopList
    {
        $this->setFilter($operator, $value, 'ip3');
        return $this;
    }

    /**
     * Октет 4 IP адреса
     *
     * @param Operators $operator
     * @param string $value
     * @return StopList
     */
    public function ip4(Operators $operator, string $value): StopList
    {
        $this->setFilter($operator, $value, 'ip4');
        return $this;
    }

    /**
     * Ссылающаяся страница, с которой приходит посетитель
     *
     * @param Operators $operator
     * @param string $value
     * @return StopList
     */
    public function urlFrom(Operators $operator, string $value): StopList
    {
        $this->setFilter($operator, $value, 'urlFrom');
        return $this;
    }


    /**
     * UserAgent посетителя
     *
     * @param Operators $operator
     * @param string $value
     * @return StopList
     */
    public function userAgent(Operators $operator, string $value): StopList
    {
        $this->setFilter($operator, $value, 'userAgent');
        return $this;
    }


    /**
     * Текст сообщения которое будет выдано посетителю сайта, в случае его попадания под данную запись стоп-листа
     *
     * @param Operators $operator
     * @param string $value
     * @return StopList
     */
    public function message(Operators $operator, string $value): StopList
    {
        $this->setFilter($operator, $value, 'message');
        return $this;
    }

    /**
     * Административный комментарий, используется как правило для указания причин создания данной записи
     *
     * @param Operators $operator
     * @param string $value
     * @return StopList
     */
    public function comments(Operators $operator, string $value): StopList
    {
        $this->setFilter($operator, $value, 'comments');
        return $this;
    }


    /**
     * Страница (или ее часть) на которую приходит посетитель
     *
     * @param Operators $operator
     * @param string $value
     * @return StopList
     */
    public function urlTo(Operators $operator, string $value): StopList
    {
        $this->setFilter($operator, $value, 'urlTo');
        return $this;
    }


    /**
     * Страница на которую необходимо перенаправить посетителя после его попадания под данную запись стоп-листа
     *
     * @param Operators $operator
     * @param string $value
     * @return StopList
     */
    public function urlRedirect(Operators $operator, string $value): StopList
    {
        $this->setFilter($operator, $value, 'urlRedirect');
        return $this;
    }

    /**
     * ID сайта для которого запись будет действительна, если значение не задано, то это означает что запись действительная для всех сайтов
     *
     * @param Operators $operator
     * @param string $value
     * @return StopList
     */
    public function siteId(Operators $operator, string $value): StopList
    {
        $this->setFilter($operator, $value, 'siteId');
        return $this;
    }

}
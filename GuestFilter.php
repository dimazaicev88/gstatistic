<?php


#>
#<
#!=
#=
#and
#or
#like
#notLike

class GuestFilter
{
    private array $arrFilter = [];

    /**
     * @param string $operator
     * @param int $value
     * @return $this
     */
    function id(string $operator, int $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'id'
        ];
        return $this;
    }

    /**
     * @return $this
     */
    public function or(): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => 'or'
        ];
        return $this;
    }

    /**
     * Был ли посетитель когда-либо авторизован на сайте:
     * @param bool $value
     * @return $this
     */
    function isRegistered(bool $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => "=",
            'value' => $value,
            'field' => 'registered'
        ];
        return $this;
    }

    /**
     * Начальное значение интервала для поля "дата первого захода на сайт"
     * @param string $operator
     * @param string $value
     * @return GuestFilter
     */
    function firstDate1(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'first_date_1'
        ];
        return $this;
    }

    /**
     * Конечное значение интервала для поля "дата первого захода на сайт"
     * @param string $operator
     * @param string $value
     * @return GuestFilter
     */
    function firstDate2(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'first_date_2'
        ];
        return $this;
    }

    /**
     * Начальное значение интервала для поля "дата последнего захода на сайт"
     * @param string $operator
     * @param string $value
     * @return GuestFilter
     */
    function lastDate1(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'last_date_1'
        ];

        return $this;
    }

    /**
     * Конечное значение интервала для поля "дата первого захода на сайт"
     * @param string $operator
     * * @param string $value
     * * @return GuestFilter
     */
    function lastDate2(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'last_date_2'
        ];

        return $this;
    }

    /**
     * Начальное значение интервала для даты посещения посетителем сайта
     * @return $this
     */
    function periodDate1(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'period_date_1'
        ];

        return $this;
    }

    /**
     * Конечно значение интервала для даты посещения посетителем сайта
     * @return $this
     */
    function periodDate2(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'period_date_2'
        ];

        return $this;
    }

    /**
     * ID сайта первого либо последнего захода;
     * @return $this
     */
    function siteId(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'period_date_2'
        ];

        return $this;
    }

    /**
     * ID сайта первого захода
     * @return $this
     */
    function firstSiteId(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'first_site_id'
        ];
        return $this;
    }


    /**
     * ID сайта последнего захода
     * @return $this
     */
    function lastSiteId(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'last_site_id'
        ];

        return $this;
    }

    /**
     * Страница откуда впервые пришел посетитель, страница на которую впервые пришел посетитель и последняя страница просмотренная посетителем;
     * @return $this
     */
    function url(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'url'
        ];

        return $this;
    }

    /**
     * URL_404 - была ли 404 ошибка на первой странице или на последней странице посещенной посетителем, возможные значения:
     * @return $this
     */
    function existsUrl404(bool $value): GuestFilter
    {
        return $this;
    }

    /**
     * UserAgent посетителя на последнем заходе;
     * @return $this
     */
    function userAgent(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'user_agent'
        ];

        return $this;
    }

    /**
     * Флаг "приходил ли посетитель когда-либо по рекламной кампании (не равной NA/NA)", возможные значения:
     * Y - посетитель приходил по какой-либо рекламной кампании(не равной NA / NA);
     * N - не приходил никогда ни по одной рекламной кампании(не равной NA / NA).
     * @return $this
     */
    function isAdv(bool $value): GuestFilter
    {
        return $this;
    }

    /**
     * ID рекламной кампании первого либо последнего захода посетителя(при этом это мог быть как прямой заход, так и возврат по рекламной кампании)
     * @return $this
     */
    function advId(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'adv_id'
        ];

        return $this;
    }

    /**
     * Идентификатор referer1 рекламной кампании первого либо последнего захода посетителя;
     * @return $this
     */
    function referer1(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'referer_1'
        ];

        return $this;
    }

    /**
     * Идентификатор referer2 рекламной кампании первого либо последнего захода посетителя
     * @return $this
     */
    function referer2(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'referer_2'
        ];

        return $this;
    }

    /**
     * Дополнительный параметр referer3 рекламной кампании первого либо последнего захода посетителя
     * @return $this
     */
    function referer3(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'referer_3'
        ];

        return $this;
    }

    /**
     * Начальное значение для интервала кол - ва событий сгенерированных посетителем
     *
     * @return $this
     */
    function events1(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'events_1'
        ];

        return $this;
    }

    /**
     * Конечное значение для интервала кол - ва событий сгенерированных посетителем;
     *
     * @return $this
     */
    function events2(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'events_2'
        ];

        return $this;
    }

    /**
     * Начальное значение для интервала кол - ва сессий сгенерированных посетителем
     * @return $this
     */
    function sess1(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'sess_1'
        ];

        return $this;
    }

    /**
     * Конечное значение для интервала кол - ва сессий сгенерированных посетителем;
     * @return $this
     */
    function sess2(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'sess_2'
        ];

        return $this;
    }

    /**
     * Начальное значение для интервала кол - ва хитов сгенерированных посетителем;
     * @return $this
     */
    function hits1(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'hits_1'
        ];

        return $this;
    }

    /**
     *  Конечное значение для интервала кол - ва хитов сгенерированных посетителем;
     * @return $this
     */
    function hits2(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'hits_2'
        ];

        return $this;
    }

    /**
     * Флаг "добавлял ли посетитель сайт в "Избранное"", возможные значения:
     * Y - добавлял;
     * N - не добавлял
     * @return $this
     */
    function favorites(): GuestFilter
    {
        return $this;
    }

    /**
     * IP адрес посетителя сайта в последнем заходе
     * @return $this
     */
    function ip(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'ip'
        ];

        return $this;
    }

    /**
     * Языки установленные в настройках браузера посетителя в последнем заходе
     * @return $this
     */
    function lang(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'lang'
        ];

        return $this;
    }

    /**
     * ID страны(двух символьный идентификатор) посетителя в последнем заходе
     * @return $this
     */
    function countryId(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'country_id'
        ];

        return $this;
    }

    /**
     * Название страны
     *
     * @return $this
     */
    function country(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'country'
        ];

        return $this;
    }

    /**
     * ID, логин, имя, фамилия пользователя, под которыми посетитель последний раз был авторизован
     * @return $this
     */
    function user(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'user'
        ];
        return $this;
    }

    /**
     * ID пользователя, под которым посетитель последний раз был авторизован
     * @return $this
     */
    function userId(string $operator, string $value): GuestFilter
    {
        $this->arrFilter[] = [
            'operator' => $operator,
            'value' => $value,
            'field' => 'user_id'
        ];

        return $this;
    }

    public function build(): string
    {
        return json_encode($this->arrFilter);
    }
}

echo
(new GuestFilter())->id(">", 123)->or()->id("<", 200)->build();
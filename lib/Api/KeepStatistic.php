<?php

namespace GStatistics\Api;

use Bitrix\Main\Context;
use Bitrix\Main\Web\Cookie;
use GStatistics\Exceptions\Http\HttpException;
use GStatistics\Http\HttpClient;
use JsonException;


class KeepStatistic
{

    /**
     * @throws HttpException | JsonException
     */
    static function Keep(): void
    {
        global $USER;

        $userId = 0;
        $siteId = "";
        $ctx = Context::getCurrent();

        $loginCookieName = COption::GetOptionString("main", "cookie_name", "BITRIX_SM") . "_LOGIN";
        if ($USER->IsAuthorized() && !empty($_COOKIE[$loginCookieName])) {
            $userId = CUser::GetByLogin($_COOKIE[$loginCookieName])->Fetch()['ID'];
        }

        if (!(defined("ADMIN_SECTION") && ADMIN_SECTION === true) && defined("SITE_ID")) {
            $siteId = SITE_ID;
        }

        $guestHash = md5(
            ($_SERVER["HTTP_USER_AGENT"] ?? '') .
            $_SERVER["REMOTE_ADDR"] .
            ($_SERVER["HTTP_X_FORWARDED_FOR"] ?? '')
        );

        $data = [
            'phpsessid' => session_id(),
            'url' => $_SERVER['REQUEST_URI'],
            'referer' => $_SERVER['HTTP_REFERER'],
            'guestHash' => $guestHash,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'userAgent' => $_SERVER['HTTP_USER_AGENT'],
            'userId' => intval($userId),
            'httpXForwardedFor' => $_SERVER['HTTP_X_FORWARDED_FOR'],
            'isError404' => defined("ERROR_404") && ERROR_404 == "Y",
            'siteId' => $siteId,
            'lang' => $_SERVER["HTTP_ACCEPT_LANGUAGE"],
            'method' => $_SERVER["REQUEST_METHOD"],
            'cookies' => json_encode($_COOKIE, JSON_UNESCAPED_UNICODE)
        ];

        if (defined("GENERATE_EVENT") && GENERATE_EVENT == "Y") {
            global $event1, $event2, $event3;

            $data['event1'] = $event1;
            $data['event2'] = $event2;
            $data['event3'] = $event3;
        }

        $answer = json_decode(json: HttpClient::sendStatistic($data), associative: true, flags: JSON_THROW_ON_ERROR);
        $ctx->getResponse()->addCookie(
            new Cookie(name: "guestUuid", value: $answer['guestUuid'], addPrefix: false)
        );
    }
}
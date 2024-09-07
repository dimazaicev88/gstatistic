<?php

use Bitrix\Main\ArgumentOutOfRangeException;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Context;

class GKeepstatistic
{


    /**
     * @throws ArgumentOutOfRangeException
     */
    static function Keep(): void
    {
        global $USER;

        $userId = 0;
        $userLogin = "";
        $isUserAuth = false;
        $siteId = "";

        Option::set("gstatistic", "server_url", "");
        $serverUrl = Option::get("gstatistic", "server_url");
        $ctx = Context::getCurrent();

        if (is_object($USER)) {
            if ($USER->GetID()) {
                $userId = $USER->GetID();
                $userLogin = $USER->GetLogin();
                $isUserAuth = true;
            }
        }

        if (!(defined("ADMIN_SECTION") && ADMIN_SECTION === true) && defined("SITE_ID")) {
            $siteId = SITE_ID;
        }

        $data = [
            'phpsessid' => session_id(),
            'guestUuid' => $ctx->getRequest()->getCookie('guestUuid'),
            'url' => $_SERVER['REQUEST_URI'],
            'referer' => $_SERVER['HTTP_REFERER'],
            'ip' => $_SERVER['REMOTE_ADDR'],
            'userAgent' => $_SERVER['HTTP_USER_AGENT'],
            'userId' => $userId,
            'userLogin' => $userLogin,
            'isUserAuth' => $isUserAuth,
            'httpXForwardedFor' => $_SERVER['HTTP_X_FORWARDED_FOR'],
            'isError404' => defined("ERROR_404") && ERROR_404 == "Y",
            'siteId' => $siteId,
            'lang' => $_SERVER["HTTP_ACCEPT_LANGUAGE"],
            'method' => $_SERVER["REQUEST_METHOD"],
            'cookies' => $_COOKIE,
            'isFavorite' => isset($_SESSION["SESS_ADD_TO_FAVORITES"]) && $_SESSION["SESS_ADD_TO_FAVORITES"] == "Y",
        ];

        if (defined("GENERATE_EVENT") && GENERATE_EVENT == "Y") {
            global $event1, $event2, $event3, $goto, $money, $currency, $site_id;

            $data['event1'] = $event1;
            $data['event2'] = $event2;
            $data['event3'] = $event3;
        }

        GStatHttpClient::post($serverUrl, $data);
    }
}
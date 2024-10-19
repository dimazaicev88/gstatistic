<?php

namespace GStatistics\Api;

use Bitrix\Main\Config\Option;
use Bitrix\Main\Context;
use Bitrix\Main\Web\Cookie;
use COption;
use Exception;
use GStatistics\Http\HttpClient;


class KeepStatistic
{

    public static function checkSkip()
    {
        global $USER;
        $GO = true;
        $skipMode = COption::GetOptionString("statistic", "SKIP_STATISTIC_WHAT");
        switch ($skipMode) {
            case "none":
                break;
            case "both":
            case "groups":
                $arUserGroups = $USER->GetUserGroupArray();
                $arSkipGroups = explode(",", COption::GetOptionString("statistic", "SKIP_STATISTIC_GROUPS"));
                foreach ($arSkipGroups as $value) {
                    if (in_array(intval($value), $arUserGroups)) {
                        $GO = false;
                        break;
                    }
                }
                if ($skipMode == "groups")
                    break;
            case "ranges":
                if ($skipMode == "both" && $GO)
                    break;//in case group check failed
                $GO = true;
                if (preg_match("/^.*?(\d+)\.(\d+)\.(\d+)\.(\d+)[\s-]*/", $_SERVER["REMOTE_ADDR"], $arIPAdress)) {
                    $arSkipIPRanges = explode("\n", COption::GetOptionString("statistic", "SKIP_STATISTIC_IP_RANGES"));
                    foreach ($arSkipIPRanges as $key => $value) {
                        if (preg_match("/^.*?(\d+)\.(\d+)\.(\d+)\.(\d+)[\s-]*(\d+)\.(\d+)\.(\d+)\.(\d+)/", $value, $arIPRange)) {
                            if (
                                intval($arIPAdress[1]) >= intval($arIPRange[1]) && intval($arIPAdress[1]) <= intval($arIPRange[5]) &&
                                intval($arIPAdress[2]) >= intval($arIPRange[2]) && intval($arIPAdress[2]) <= intval($arIPRange[6]) &&
                                intval($arIPAdress[3]) >= intval($arIPRange[3]) && intval($arIPAdress[3]) <= intval($arIPRange[7]) &&
                                intval($arIPAdress[4]) >= intval($arIPRange[4]) && intval($arIPAdress[4]) <= intval($arIPRange[8])
                            ) {
                                $GO = false;
                                break;
                            }
                        }
                    }
                }
                break;
        }
        return $GO;
    }


    /**
     */
    static function Keep(): void
    {
        global $USER;

        $userId = 0;
        $userLogin = "";
        $isUserAuth = false;
        $siteId = "";
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
            'userId' => intval($userId),
            'userLogin' => $userLogin,
            'isUserAuth' => $isUserAuth,
            'httpXForwardedFor' => $_SERVER['HTTP_X_FORWARDED_FOR'],
            'isError404' => defined("ERROR_404") && ERROR_404 == "Y",
            'siteId' => $siteId,
            'lang' => $_SERVER["HTTP_ACCEPT_LANGUAGE"],
            'method' => $_SERVER["REQUEST_METHOD"],
            'cookies' => json_encode($_COOKIE, JSON_UNESCAPED_UNICODE),
            'isFavorite' => isset($_SESSION["SESS_ADD_TO_FAVORITES"]) && $_SESSION["SESS_ADD_TO_FAVORITES"] == "Y",
        ];

        if (defined("GENERATE_EVENT") && GENERATE_EVENT == "Y") {
            global $event1, $event2, $event3, $goto, $money, $currency, $site_id;

            $data['event1'] = $event1;
            $data['event2'] = $event2;
            $data['event3'] = $event3;
        }

        try {
            $answer = json_decode(json: HttpClient::post('/statistic/add', $data), associative: true, flags: JSON_THROW_ON_ERROR);
            $ctx->getResponse()->addCookie(
                new Cookie(name: "guestUuid", value: $answer['guestUuid'], addPrefix: false)
            );
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
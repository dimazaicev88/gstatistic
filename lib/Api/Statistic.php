<?php

namespace GStatistics\Api;

class Statistics
{


    public static function setNoKeepStatistics()
    {
        if (!isset($_SESSION["SESS_NO_KEEP_STATISTIC"]) || $_SESSION["SESS_NO_KEEP_STATISTIC"] == '') {
            $key_to_check = "no_keep_statistic_" . LICENSE_KEY;
            if (isset($_REQUEST[$key_to_check]) && $_REQUEST[$key_to_check] <> '') {
                $_SESSION["SESS_NO_KEEP_STATISTIC"] = $_REQUEST[$key_to_check];
                if (!isset($_SESSION["SESS_NO_AGENT_STATISTIC"]) || $_SESSION["SESS_NO_AGENT_STATISTIC"] == '')
                    $_SESSION["SESS_NO_AGENT_STATISTIC"] = $_REQUEST[$key_to_check];
            }
        }

        $key_to_check = "no_agent_statistic_" . LICENSE_KEY;
        if (isset($_REQUEST[$key_to_check]) && $_REQUEST[$key_to_check] <> '') {
            if (!isset($_SESSION["SESS_NO_AGENT_STATISTIC"]) || $_SESSION["SESS_NO_AGENT_STATISTIC"] == '')
                $_SESSION["SESS_NO_AGENT_STATISTIC"] = $_REQUEST[$key_to_check];
        }
    }

    public static function BlockVisitorActivity2()
    {
        global $USER;

        // Skip checks if the user is an admin or if the activity check is disabled
        if (is_object($USER) && $USER->IsAdmin()) {
            return false;
        }
        if (defined("STATISTIC_SKIP_ACTIVITY_CHECK")) {
            return false;
        }

        // Proceed only if activity defense is enabled
        if (COption::GetOptionString("statistic", "DEFENCE_ON") === "Y") {
            // Initialize or toggle searcher check activity
            $_SESSION["SESS_SEARCHER_CHECK_ACTIVITY"] = isset($_SESSION["SESS_SEARCHER_CHECK_ACTIVITY"]) && $_SESSION["SESS_SEARCHER_CHECK_ACTIVITY"] === "N" ? "N" : "Y";

            // Check if it's not a searcher or if it's a searcher with activity limit check enabled
            if (!isset($_SESSION["SESS_SEARCHER_ID"]) || intval($_SESSION["SESS_SEARCHER_ID"]) <= 0 || $_SESSION["SESS_SEARCHER_CHECK_ACTIVITY"] === "Y") {
                $defenseDelay = intval(COption::GetOptionString("statistic", "DEFENCE_DELAY"));
                $stackTimeLimit = COption::GetOptionString("statistic", "DEFENCE_STACK_TIME");
                $maxStackHits = COption::GetOptionString("statistic", "DEFENCE_MAX_STACK_HITS");

                // Ensure stack time limit is greater than 0
                if (intval($stackTimeLimit) > 0) {
                    // Check if activity limit was previously exceeded
                    if (!empty($_SESSION["SESS_GRABBER_STOP_TIME"])) {
                        if ((time() - $_SESSION["SESS_GRABBER_STOP_TIME"]) <= $defenseDelay) {
                            $_SESSION["SESS_GRABBER_DEFENCE_STACK"] = [];
                            return true;
                        }
                        // Reset stop time after delay expires
                        $_SESSION["SESS_GRABBER_STOP_TIME"] = null;
                    }

                    // Initialize or update the defense stack
                    if (isset($_SESSION["SESS_GRABBER_DEFENCE_STACK"]) && is_array($_SESSION["SESS_GRABBER_DEFENCE_STACK"])) {
                        $_SESSION["SESS_GRABBER_DEFENCE_STACK"][] = time();

                        // Clear old hits outside the allowed time frame
                        $firstHitTime = reset($_SESSION["SESS_GRABBER_DEFENCE_STACK"]);
                        while ((time() - $firstHitTime) > $stackTimeLimit && !empty($_SESSION["SESS_GRABBER_DEFENCE_STACK"])) {
                            array_shift($_SESSION["SESS_GRABBER_DEFENCE_STACK"]);
                            $firstHitTime = reset($_SESSION["SESS_GRABBER_DEFENCE_STACK"]);
                        }

                        $currentStackHits = count($_SESSION["SESS_GRABBER_DEFENCE_STACK"]);

                        // Check if the hit count exceeds the limit
                        if ($currentStackHits > $maxStackHits) {
                            $_SESSION["SESS_GRABBER_STOP_TIME"] = time();

                            if (COption::GetOptionString("statistic", "DEFENCE_LOG") === "Y") {
                                CEventLog::Log("WARNING", "STAT_ACTIVITY_LIMIT", "statistic", "", GetMessage("STAT_DEFENCE_LOG_MESSAGE", [
                                    "#ACTIVITY_TIME_LIMIT#" => $stackTimeLimit,
                                    "#ACTIVITY_HITS#" => $currentStackHits,
                                    "#ACTIVITY_EXCEEDING#" => $currentStackHits - $maxStackHits,
                                ]));
                            }

                            // Send notification email if not already sent
                            if ($_SESSION["ACTIVITY_EXCEEDING_NOTIFIED"] !== "Y") {
                                $siteId = defined("SITE_ID") && SITE_ID !== '' ? SITE_ID : CSite::GetDefSiteID();
                                $siteInfo = CSite::GetByID($siteId)->Fetch();

                                // Prepare links for the email
                                $sessionLink = intval($_SESSION["SESS_SESSION_ID"]) > 0 ? "/bitrix/admin/session_list.php?lang={$siteInfo['LANGUAGE_ID']}&find_id={$_SESSION['SESS_SESSION_ID']}&set_filter=Y" : "";
                                $visitorLink = intval($_SESSION["SESS_GUEST_ID"]) > 0 ? "/bitrix/admin/guest_list.php?lang={$siteInfo['LANGUAGE_ID']}&find_id={$_SESSION['SESS_GUEST_ID']}&set_filter=Y" : "";
                                $stopListLink = "/bitrix/admin/stoplist_edit.php?lang={$siteInfo['LANGUAGE_ID']}&net1=".intval($_SERVER['REMOTE_ADDR'][0])."&net2=".intval($_SERVER['REMOTE_ADDR'][1])."&net3=".intval($_SERVER['REMOTE_ADDR'][2])."&net4=".intval($_SERVER['REMOTE_ADDR'][3])."&user_agent=".urlencode($_SERVER['HTTP_USER_AGENT']);
                                $searcherLink = intval($_SESSION["SESS_SEARCHER_ID"]) > 0 ? "/bitrix/admin/hit_searcher_list.php?lang={$siteInfo['LANGUAGE_ID']}&find_searcher_id={$_SESSION['SESS_SEARCHER_ID']}&set_filter=Y" : "";

                                // Prepare event fields
                                $eventFields = [
                                    "ACTIVITY_TIME_LIMIT" => $stackTimeLimit,
                                    "ACTIVITY_HITS" => $currentStackHits,
                                    "ACTIVITY_HITS_LIMIT" => $maxStackHits,
                                    "ACTIVITY_EXCEEDING" => $currentStackHits - $maxStackHits,
                                    "CURRENT_TIME" => GetTime(time(), "FULL", $siteId),
                                    "DELAY_TIME" => $defenseDelay,
                                    "USER_AGENT" => $_SERVER["HTTP_USER_AGENT"],
                                    "SESSION_ID" => $_SESSION["SESS_SESSION_ID"],
                                    "SESSION_LINK" => $sessionLink,
                                    "SEARCHER_ID" => $_SESSION["SESS_SEARCHER_ID"],
                                    "SEARCHER_NAME" => $_SESSION["SESS_SEARCHER_NAME"],
                                    "SEARCHER_LINK" => $searcherLink,
                                    "VISITOR_ID" => $_SESSION["SESS_GUEST_ID"],
                                    "VISITOR_LINK" => $visitorLink,
                                    "STOPLIST_LINK" => $stopListLink,
                                    "EMAIL_TO" => COption::GetOptionString("main", "email_from", ""),
                                ];

                                CEvent::Send("STATISTIC_ACTIVITY_EXCEEDING", $siteId, $eventFields);

                                $_SESSION["ACTIVITY_EXCEEDING_NOTIFIED"] = "Y";
                            }
                        }
                    }
                }
            }
        }

        return false;
    }


    public static function BlockVisitorActivity()
    {
        global $USER;
        if(is_object($USER) && $USER->IsAdmin())
            return false;
        if(defined("STATISTIC_SKIP_ACTIVITY_CHECK"))
            return false;
        if(COption::GetOptionString("statistic", "DEFENCE_ON")=="Y")
        {
            $_SESSION["SESS_SEARCHER_CHECK_ACTIVITY"] = (isset($_SESSION["SESS_SEARCHER_CHECK_ACTIVITY"]) && $_SESSION["SESS_SEARCHER_CHECK_ACTIVITY"]=="N") ? "N" : "Y";
            // если это не поисковик или поисковик, но с установленным флагом "проверять лимит активности"
            if (
                !isset($_SESSION["SESS_SEARCHER_ID"])
                || intval($_SESSION["SESS_SEARCHER_ID"]) <= 0
                || $_SESSION["SESS_SEARCHER_CHECK_ACTIVITY"] == "Y"
            )
            {
                // если установлен максимальный интервал времени для стэка защиты то
                $DEFENCE_DELAY = intval(COption::GetOptionString("statistic", "DEFENCE_DELAY"));
                $STACK_TIME = COption::GetOptionString("statistic", "DEFENCE_STACK_TIME");
                $MAX_STACK_HITS = COption::GetOptionString("statistic", "DEFENCE_MAX_STACK_HITS");
                $STACK_HITS = 0;

                if (intval($STACK_TIME)>0)
                {
                    // если лимит активности уже превышался то
                    if (!empty($_SESSION["SESS_GRABBER_STOP_TIME"]))
                    {
                        // если время задержки еще не истекло то
                        if ((time()-$_SESSION["SESS_GRABBER_STOP_TIME"])<=$DEFENCE_DELAY)
                        {
                            // держим дальше
                            $_SESSION["SESS_GRABBER_DEFENCE_STACK"] = array();
                            return true;
                        }
                        else // иначе
                        {
                            // обнуляем время блокирования
                            $_SESSION["SESS_GRABBER_STOP_TIME"] = "";
                        }
                    }
                    if (isset($_SESSION["SESS_GRABBER_DEFENCE_STACK"]) && is_array($_SESSION["SESS_GRABBER_DEFENCE_STACK"]))
                    {
                        // запомним время текущего хита в стэке
                        $_SESSION["SESS_GRABBER_DEFENCE_STACK"][] = time();
                        // почистим стэк до заданного максимального интервала времени
                        $first_element = reset($_SESSION["SESS_GRABBER_DEFENCE_STACK"]);
                        $stmp = time();
                        $current_stack_length = $stmp-$first_element;
                        while($current_stack_length>$STACK_TIME && count($_SESSION["SESS_GRABBER_DEFENCE_STACK"])>0)
                        {
                            $first_element = array_shift($_SESSION["SESS_GRABBER_DEFENCE_STACK"]);
                            $current_stack_length = $stmp-$first_element;
                        }
                        $STACK_HITS = count($_SESSION["SESS_GRABBER_DEFENCE_STACK"]);
                    }
                    // проверим стэк на превышение максимального кол-ва хитов
                    if ($STACK_HITS > $MAX_STACK_HITS)
                    {
                        // инициализируем превышение активности
                        $stmp = time();
                        $_SESSION["SESS_GRABBER_STOP_TIME"] = $stmp;

                        if(COption::GetOptionString("statistic", "DEFENCE_LOG") === "Y")
                            CEventLog::Log("WARNING", "STAT_ACTIVITY_LIMIT", "statistic", "", GetMessage("STAT_DEFENCE_LOG_MESSAGE", array(
                                "#ACTIVITY_TIME_LIMIT#" => intval($STACK_TIME),
                                "#ACTIVITY_HITS#" => intval($STACK_HITS),
                                "#ACTIVITY_EXCEEDING#" => (intval($STACK_HITS) - intval($MAX_STACK_HITS)),
                            )));

                        // если в этой сессии письмо еще не отсылали то
                        if ($_SESSION["ACTIVITY_EXCEEDING_NOTIFIED"]!="Y")
                        {
                            if (defined("SITE_ID") && SITE_ID <> '')
                            {
                                $rsSite = CSite::GetByID(SITE_ID);
                                $arSite = $rsSite->Fetch();
                                $site_id = SITE_ID;
                            }
                            else
                            {
                                $rsSite = CSite::GetDefList();
                                $arSite = $rsSite->Fetch();
                                $site_id = $arSite["ID"];
                            }

                            $SESSION_LINK = intval($_SESSION["SESS_SESSION_ID"])>0? "/bitrix/admin/session_list.php?lang=". $arSite["LANGUAGE_ID"]."&find_id=".$_SESSION["SESS_SESSION_ID"]."&find_id_exact_match=Y&set_filter=Y": "";
                            $VISITOR_LINK = intval($_SESSION["SESS_GUEST_ID"])>0? "/bitrix/admin/guest_list.php?lang=". $arSite["LANGUAGE_ID"]."&find_id=".$_SESSION["SESS_GUEST_ID"]."&find_id_exact_match=Y&set_filter=Y": "";

                            $arr = explode(".",$_SERVER["REMOTE_ADDR"]);
                            $STOPLIST_LINK = "/bitrix/admin/stoplist_edit.php?lang=". $arSite["LANGUAGE_ID"]."&net1=".intval($arr[0])."&net2=".intval($arr[1])."&net3=". intval($arr[2])."&net4=".intval($arr[3])."&user_agent=".urlencode($_SERVER["HTTP_USER_AGENT"]);

                            $SEARCHER_LINK = intval($_SESSION["SESS_SEARCHER_ID"])>0? "/bitrix/admin/hit_searcher_list.php?lang=". $arSite["LANGUAGE_ID"]."&find_searcher_id=".$_SESSION["SESS_SEARCHER_ID"]."&set_filter=Y": "";

                            $arEventFields = array(
                                "ACTIVITY_TIME_LIMIT"	=> intval($STACK_TIME),
                                "ACTIVITY_HITS"			=> $STACK_HITS,
                                "ACTIVITY_HITS_LIMIT"	=> intval($MAX_STACK_HITS),
                                "ACTIVITY_EXCEEDING"	=> $STACK_HITS - intval($MAX_STACK_HITS),
                                "CURRENT_TIME"			=> GetTime($stmp,"FULL",$arSite["ID"]),
                                "DELAY_TIME"			=> $DEFENCE_DELAY,
                                "USER_AGENT"			=> $_SERVER["HTTP_USER_AGENT"],
                                "SESSION_ID"			=> $_SESSION["SESS_SESSION_ID"],
                                "SESSION_LINK"			=> $SESSION_LINK,
                                "SERACHER_ID"			=> $_SESSION["SESS_SEARCHER_ID"],
                                "SEARCHER_NAME"			=> $_SESSION["SESS_SEARCHER_NAME"],
                                "SEARCHER_LINK"			=> $SEARCHER_LINK,
                                "VISITOR_ID"			=> $_SESSION["SESS_GUEST_ID"],
                                "VISITOR_LINK"			=> $VISITOR_LINK,
                                "STOPLIST_LINK"			=> $STOPLIST_LINK,
                                "EMAIL_TO"			=> COption::GetOptionString("main", "email_from", ""),
                            );

                            CEvent::Send("STATISTIC_ACTIVITY_EXCEEDING", $site_id, $arEventFields);

                            $_SESSION["ACTIVITY_EXCEEDING_NOTIFIED"] = "Y";
                        }
                    }
                }
            }
        }
        return false;
    }
}

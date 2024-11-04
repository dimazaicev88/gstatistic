<?php

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Text\HtmlFilter;

IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"] . BX_ROOT . "/modules/main/options.php");
IncludeModuleLangFile(__FILE__);

$moduleId = "gstatistic";
$moduleAccessLevel = $APPLICATION->GetGroupRight($moduleId);
$strError = "";
$ctx = Bitrix\Main\Context::getCurrent();
if ($moduleAccessLevel >= "R") {

    $arTabs = [
        ["DIV" => "edit1",
            "TAB" => GetMessage("MAIN_TAB_SET"),
            "ICON" => "statistic_settings",
            "TITLE" => GetMessage("MAIN_TAB_TITLE_SET")
        ]
    ];
    $tabControl = new CAdminTabControl("tabControl", $arTabs);

    $tabControl->Begin(); ?>


    <form method="POST" action="<?= $APPLICATION->GetCurPage(); ?>?lang=<?= LANGUAGE_ID; ?>&mid=<?= $moduleId; ?>"
          name="currency_settings">
        <?= bitrix_sessid_post();

        $tabControl->BeginNextTab();
        ?>
        <tr>
            <td style="width: 40%;">Curl timeout: </td>
            <td><input type="text"  maxlength="255" value="500" name="curl_timeout"></td>
        </tr>
        <tr>
            <td style="width: 40%;">Server url: </td>
            <td><input type="text"  maxlength="255" value="500" name="server_url"></td>
        </tr>
        <?php
        $tabControl->End();

//        require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/admin/group_rights.php';

        $tabControl->Buttons(); ?>
        <input
                type="submit"<?= ($moduleAccessLevel < 'W' ? ' disabled' : ''); ?>
                name="Update"
                class="adm-btn-save"
                value="<?= HtmlFilter::encode(Loc::getMessage('CUR_OPTIONS_BTN_SAVE')); ?>"
                title="<?= HtmlFilter::encode(Loc::getMessage('CUR_OPTIONS_BTN_SAVE_TITLE')); ?>"
        >
        <input type="hidden" name="Update" value="Y">
        <input
                type="reset"
                name="reset"
                value="<?= HtmlFilter::encode(Loc::getMessage('CUR_OPTIONS_BTN_RESET')); ?>"
                title="<?= HtmlFilter::encode(Loc::getMessage('CUR_OPTIONS_BTN_RESET_TITLE')); ?>"
        >
        <input
                type="button"<?= ($moduleAccessLevel < 'W' ? ' disabled' : ''); ?>
                value="<?= HtmlFilter::encode(Loc::getMessage('CUR_OPTIONS_BTN_RESTORE_DEFAULT')); ?>"
                title="<?= HtmlFilter::encode(Loc::getMessage('CUR_OPTIONS_BTN_HINT_RESTORE_DEFAULT')); ?>"
                onclick="RestoreDefaults();"
        >
    </form>


    <?php
    $tabControl->End();

    if (
        $ctx->getRequest()->isPost() // проверка метода вызова страницы
        &&
        ($save != "" || $apply != "") // проверка нажатия кнопок "Сохранить" и "Применить"
        &&
        $POST_RIGHT == "W"          // проверка наличия прав на запись для модуля
        &&
        check_bitrix_sessid()     // проверка идентификатора сессии
    ) {
        // сохранение данных
    }

}
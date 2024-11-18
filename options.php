<?php

use Bitrix\Main\Config\Option;
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
            <td style="width: 40%;">Curl timeout (ms):</td>
            <td><input type="text" maxlength="15"
                       value="<?= Option::get($moduleId, "GSTATISTIC_CURL_TIMEOUT", 500); ?>"
                       name="curl_timeout"></td>
        </tr>
        <tr>
            <td style="width: 40%;">Statistic server url:</td>
            <?php var_dump(Option::get($moduleId, "GSTATISTIC_SERVER_URL", '')); ?>

            <td><input type="text" value="<?= Option::get($moduleId, "GSTATISTIC_SERVER_URL", ''); ?>"
                       name="server_url"></td>
        </tr>
        <?php
        $tabControl->End();
        $tabControl->Buttons(); ?>
        <input
                type="submit"
                name="Update"
                class="adm-btn-save"
                value="<?= HtmlFilter::encode(Loc::getMessage('CUR_OPTIONS_BTN_SAVE')); ?>"
                title="<?= HtmlFilter::encode(Loc::getMessage('CUR_OPTIONS_BTN_SAVE_TITLE')); ?>"
        >
        <input type="hidden" name="Update" value="Y">
    </form>
    <?php
    if (
        $ctx->getRequest()->isPost() &&
        $ctx->getRequest()->getPost('Update') === 'Y' &&
        check_bitrix_sessid()
    ) {
        Option::set($moduleId, "GSTATISTIC_CURL_TIMEOUT", intval($ctx->getRequest()->getPost('curl_timeout')));
        Option::set($moduleId, "GSTATISTIC_SERVER_URL", $ctx->getRequest()->getPost('server_url'));
    }
}
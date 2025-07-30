<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\ArrayHelper;
use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 */

class IntecNotificationsComponent extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        if (!is_array($arParams))
            $arParams = [];

        $arParams = ArrayHelper::merge([
            'DESCRIPTION_TEXT' => null,
            'LINK' => null,
            'LINK_TEXT' => null,
            'ACCEPT_TEXT'=> null,
            'SLIM_MODE' => 'N',
            'SLIM_TITLE' => null,
        ], $arParams);

        return $arParams;
    }

    public function executeComponent()
    {
        $this->arResult = [
            'DESCRIPTION_TEXT' => $this->arParams['DESCRIPTION_TEXT'],
            'LINK' => $this->arParams['LINK'],
            'LINK_TEXT' => $this->arParams['LINK_TEXT'],
            'SLIM_MODE' => $this->arParams['SLIM_MODE'],
            'SLIM_TITLE' => $this->arParams['SLIM_TITLE'],
            'ACCEPT_TEXT' => $this->arParams['ACCEPT_TEXT'],
        ];

        if (empty($this->arResult['DESCRIPTION_TEXT']))
            $this->arResult['DESCRIPTION_TEXT'] = Loc::getMessage('C_MAIN_NOTIFICATIONS_DESCRIPTION_TEXT_DEFAULT');

        if (empty($this->arResult['LINK_TEXT']))
            $this->arResult['LINK_TEXT'] = Loc::getMessage('C_MAIN_NOTIFICATIONS_LINK_TEXT_DEFAULT');

        if (empty($this->arResult['ACCEPT_TEXT']))
            $this->arResult['ACCEPT_TEXT'] = Loc::getMessage('C_MAIN_NOTIFICATIONS_ACCEPT_TEXT_DEFAULT');



        $this->includeComponentTemplate();
    }
}

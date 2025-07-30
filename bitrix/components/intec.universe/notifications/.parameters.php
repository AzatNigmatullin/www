<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die() ?>
<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use intec\core\collections\Arrays;

/**
 * @var array $arCurrentValues
*/

if (!Loader::includeModule('intec.core'))
    return;

$arParameters = [];
$arParameters['DESCRIPTION_TEXT'] = [
    'PARENT' => 'BASE',
    'NAME' => Loc::getMessage('C_MAIN_NOTIFICATIONS_DESCRIPTION_TEXT'),
    'TYPE' => 'HTML',
    'DEFAULT' => Loc::getMessage('S_MAIN_NOTIFICATIONS_DESCRIPTION_TEXT')
];
$arParameters['ACCEPT_TEXT'] = [
    'PARENT' => 'BASE',
    'NAME' => Loc::getMessage('C_MAIN_NOTIFICATIONS_ACCEPT_TEXT'),
    'TYPE' => 'STRING',
    'DEFAULT' => Loc::getMessage('S_MAIN_NOTIFICATIONS_ACCEPT_TEXT')
];
$arParameters['SLIM_MODE'] = [
    'PARENT' => 'BASE',
    'NAME' => Loc::getMessage('C_MAIN_NOTIFICATIONS_SLIM_MODE'),
    'TYPE' => 'CHECKBOX',
    'DEFAULT' => 'N',
    'REFRESH'=>'Y'
];

if ($arCurrentValues['SLIM_MODE'] === 'Y') {
    $arParameters['SLIM_TITLE'] = [
        'PARENT' => 'BASE',
        'NAME' => Loc::getMessage('C_MAIN_NOTIFICATIONS_SLIM_TITLE'),
        'TYPE' => 'STRING',
        'DEFAULT' =>  Loc::getMessage('S_MAIN_NOTIFICATIONS_SLIM_TITLE'),
    ];
    $arParameters['LINK_TEXT'] = [
        'PARENT' => 'BASE',
        'NAME' => Loc::getMessage('C_MAIN_NOTIFICATIONS_LINK_TEXT'),
        'TYPE' => 'STRING',
        'DEFAULT' => Loc::getMessage('S_MAIN_NOTIFICATIONS_LINK_TEXT'),
    ];
    $arParameters['LINK'] = [
        'PARENT' => 'BASE',
        'NAME' => Loc::getMessage('C_MAIN_NOTIFICATIONS_LINK'),
        'TYPE' => 'STRING',
        'DEFAULT' => Loc::getMessage('S_MAIN_NOTIFICATIONS_LINK_ADDR')
    ];
}

$arComponentParameters = [
    'PARAMETERS' => $arParameters
];
<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)die();

use intec\core\helpers\ArrayHelper;
use intec\template\Properties;
use intec\core\helpers\Type;

/**
 * @var array $arResult
 * @var array $arParams
 */

$arParams = ArrayHelper::merge([
    'SETTINGS_USE' => 'N',
    'LAZYLOAD_USE' => 'N',
    'PICTURE_SOURCES' => 'PREVIEW',
    'PROPERTY_DURATION' => null
], $arParams);

if ($arParams['SETTINGS_USE'] === 'Y')
    include(__DIR__.'/modifiers/settings.php');

$arParams['PICTURE_SOURCES'] = ArrayHelper::fromRange(['PREVIEW', 'DETAIL'], $arParams['PICTURE_SOURCES']);

$arVisual = ArrayHelper::merge($arResult['VISUAL'], [
    'LAZYLOAD' => [
        'USE' => $arParams['LAZYLOAD_USE'] === 'Y',
        'STUB' => null
    ],
    'NAVIGATION' => [
        'SHOW' => [
            'TOP' => false,
            'BOTTOM' => false,
            'ALWAYS' => $arParams['PAGER_SHOW_ALWAYS']
        ],
        'COUNT' => Type::toInteger($arParams['NEWS_COUNT'])
    ],
    'DURATION' => $arParams['PROPERTY_DURATION']
]);

if (defined('EDITOR'))
    $arVisual['LAZYLOAD']['USE'] = false;

if ($arVisual['LAZYLOAD']['USE'])
    $arVisual['LAZYLOAD']['STUB'] = Properties::get('template-images-lazyload-stub');

/** Навигация */
$arNavigation = [];

if (!empty($arResult['NAV_RESULT'])) {

    $arNavigation = [
        'PAGE' => [
            'COUNT' => $arResult['NAV_RESULT']->NavPageCount,
            'NUMBER' => $arResult['NAV_RESULT']->NavPageNomer,
        ],
        'NUMBER' => $arResult['NAV_RESULT']->NavNum
    ];

    if ($arVisual['NAVIGATION']['SHOW']['ALWAYS']) {
        $arVisual['NAVIGATION']['SHOW']['TOP'] = $arParams['DISPLAY_TOP_PAGER'];
        $arVisual['NAVIGATION']['SHOW']['BOTTOM'] = $arParams['DISPLAY_BOTTOM_PAGER'];
    } else if ($arVisual['NAVIGATION']['COUNT'] > 0 && $arNavigation['PAGE']['COUNT'] > 1) {
        $arVisual['NAVIGATION']['SHOW']['TOP'] = $arParams['DISPLAY_TOP_PAGER'];
        $arVisual['NAVIGATION']['SHOW']['BOTTOM'] = $arParams['DISPLAY_BOTTOM_PAGER'];
    }
} else {
    $arVisual['NAVIGATION']['SHOW']['TOP'] = false;
    $arVisual['NAVIGATION']['SHOW']['BOTTOM'] = false;
}

$arResult['NAVIGATION'] = $arNavigation;

$arResult['VISUAL'] = $arVisual;

unset($arVisual);

$arElement = [];
if ($arParams['DISPLAY_FIRST_VIDEO'] === 'Y') {
    foreach ($arResult['ITEMS'] as $el){
        if(empty($arParams['IBLOCK_DISPLAY_VIDEO']) || in_array($el['ID'], $arParams['IBLOCK_DISPLAY_VIDEO'])) {
            if ($el['ID'] == $arParams['IBLOCK_FIRST_VIDEO'])
                array_unshift($arElement, $el);
            else
                $arElement[] = $el;
        }
    }

    $arResult['ITEMS'] = $arElement;
}

foreach ($arResult['ITEMS'] as &$element){
    $data = [
        'PICTURE' => [
            'ID' => null
        ]
    ];

    if ($arParams['PICTURE_SOURCES'] === 'PREVIEW' && !empty($element['PREVIEW_PICTURE']))
        $data['PICTURE']['ID'] = $element['PREVIEW_PICTURE']['ID'];
    elseif (!empty($element['DETAIL_PICTURE']))
        $data['PICTURE']['ID'] = $element['DETAIL_PICTURE']['ID'];

    $element['DATA'] = $data;

    unset($data);
}

<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;
use intec\core\helpers\Html;

/**
 * @var array $arResult
 */

?>
<?= Html::beginTag('div', [
    'class' => Html::cssClassFromArray([
        'notification' => true,
        'notification-default' => true,
        'intec-content' => $arResult['SLIM_MODE'] != 'Y',
        'slim' => $arResult['SLIM_MODE']== 'Y'
    ], true)
]) ?>
    <?= Html::beginTag('div', [
        'class' => Html::cssClassFromArray([
            'notification-content' => true,
            'intec-content-wrapper' => true,
            'slim' => $arResult['SLIM_MODE'] == 'Y'
        ], true)
    ]) ?>
        <div class="notification-text-wrapper">
            <?php if ($arResult['SLIM_TITLE'] && $arResult['SLIM_MODE'] == 'Y') {?>
                <div class="notification-title">
                    <?= htmlspecialcharsbx($arResult['SLIM_TITLE']) ?>
                </div>
            <?php }?>
            <?= Html::tag('div',  html_entity_decode($arResult['DESCRIPTION_TEXT']), [
                'class' => Html::cssClassFromArray([
                    'notification-description' => true,
                    'slim' => $arResult['SLIM_MODE'] == 'Y'
                ], true)
            ]) ?>
        </div>
        <div class="notification-button-wrapper">
            <?= Html::tag('a', $arResult['ACCEPT_TEXT'], [
                    'class' => [
                        'widget-agree',
                        'intec-ui',
                        'intec-ui' => [
                            'control-button',
                            'mod-round-3',
                            'scheme-current',
                            'size-3'
                        ]
                    ]
            ]) ?>
            <?php if (!empty($arResult['LINK']) && $arResult['SLIM_MODE'] === 'Y') { ?>
                <?= Html::tag('a', $arResult['LINK_TEXT'], [
                    'class' => [
                        'notification-button',
                        'intec-ui',
                        'intec-ui' => [
                            'control-button',
                            'scheme-current',
                            'size-4',
                            'mod-transparent',
                            'mod-round-2'
                        ]
                    ],
                    'href' => $arResult['LINK']
                ]) ?>
            <?php } ?>
        </div>
    <?= Html::endTag('div') ?>
<?= Html::endTag('div') ?>

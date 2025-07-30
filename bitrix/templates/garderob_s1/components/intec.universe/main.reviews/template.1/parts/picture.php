<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use intec\core\helpers\Html;

/**
 * @var array $arVisual
 * @var string $sTag
 */

?>
<?php return function (&$arItem) use (&$arVisual, &$sTag) { ?>
    <?php if ($arVisual['VIDEO']['SHOW'] && !empty($arItem['DATA']['VIDEO']['VIDEO'])) { ?>
        <?php

        $sPicture = null;

        if (!empty($arItem['DATA']['VIDEO']['VIDEO'][$arVisual['VIDEO']['QUALITY']]))
            $sPicture = $arItem['DATA']['VIDEO']['VIDEO'][$arVisual['VIDEO']['QUALITY']];

        if (empty($sPicture)) {
            if (!empty($arItem['DATA']['VIDEO']['PICTURE']))
                $sPicture = $arItem['DATA']['VIDEO']['PICTURE'];

            $sPicture = CFile::ResizeImageGet($sPicture, [
                'width' => 340,
                'height' => 340
            ], BX_RESIZE_IMAGE_PROPORTIONAL_ALT);

            if (!empty($sPicture)) {
                $sPicture = $sPicture['src'];
            } else {
                $sPicture = SITE_TEMPLATE_PATH.'/images/picture.missing.png';
            }
        }

        ?>
        <?= Html::beginTag('div', [
            'class' => 'widget-item-picture',
            'style' => [
                'background-image' => !$arVisual['LAZYLOAD']['USE'] ? 'url(\''.$sPicture.'\')' : null
            ],
            'data' => [
                'role' => 'video',
                'src' => $arItem['DATA']['VIDEO']['VIDEO']['iframe'],
                'lazyload-use' => $arVisual['LAZYLOAD']['USE'] ? 'true' : 'false',
                'original' => $arVisual['LAZYLOAD']['USE'] ? $sPicture : null
            ]
        ]) ?>
            <svg class="widget-item-picture-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="#FFF" d="M216 354.9V157.1c0-10.7 13-16.1 20.5-8.5l98.3 98.9c4.7 4.7 4.7 12.2 0 16.9l-98.3 98.9c-7.5 7.7-20.5 2.3-20.5-8.4zM256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zm0 48C145.5 56 56 145.5 56 256s89.5 200 200 200 200-89.5 200-200S366.5 56 256 56z"></path>
            </svg>
            <img src="<?= $sPicture ?>" alt="<?= $arItem['DATA']['VIDEO']['NAME'] ?>">
        <?= Html::endTag('div') ?>
    <?php } else {

        $sPicture = $arItem['PREVIEW_PICTURE'];

        if (empty($sPicture))
            $sPicture = $arItem['DETAIL_PICTURE'];

        if (!empty($sPicture)) {
            $sPicture = CFile::ResizeImageGet(
                $sPicture, [
                'width' => 300,
                'height' => 300
            ],
                BX_RESIZE_IMAGE_PROPORTIONAL_ALT
            );

            if (!empty($sPicture))
                $sPicture = $sPicture['src'];
        }

        if (empty($sPicture))
            $sPicture = SITE_TEMPLATE_PATH.'/images/picture.missing.png';

    ?>
        <?= Html::tag($sTag, null, [
            'class' => [
                'widget-item-picture',
                'intec-image-effect'
            ],
            'href' => $sTag === 'a' ? $arItem['DETAIL_PAGE_URL'] : null,
            'target' => $sTag === 'a' && $arVisual['LINK']['BLANK'] ? '_blank' : null,
            'data' => [
                'lazyload-use' => $arVisual['LAZYLOAD']['USE'] ? 'true' : 'false',
                'original' => $arVisual['LAZYLOAD']['USE'] ? $sPicture : null
            ],
            'style' => [
                'background-image' => !$arVisual['LAZYLOAD']['USE'] ? 'url(\''.$sPicture.'\')' : null
            ]
        ]) ?>
    <?php } ?>
<?php } ?>
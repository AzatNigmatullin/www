<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

use intec\core\helpers\Html;
use intec\core\collections\Arrays;
use intec\core\io\Path;

/**
 * @var Arrays $blocks
 * @var string $page
 * @var Closure $render($block, $data = [])
 * @var Path $path
 * @global CMain $APPLICATION
 */

$render($blocks->get('stories'));
$render($blocks->get('advantages'));
$render($blocks->get('icons'));
$render($blocks->get('categories'));
$render($blocks->get('sections'));
$render($blocks->get('products'));
$render($blocks->get('images'));
$render($blocks->get('products.2'), ['path' => 'products.2']);
$render($blocks->get('products-reviews'));

?>
<?= Html::beginTag('div') ?>
    <?php $APPLICATION->IncludeComponent(
        "intec.universe:main.widget",
        "form.1",
        array(
            "SETTINGS_USE" => "Y",
            "LAZYLOAD_USE" => "N",
            "WEB_FORM_ID" => "1",
            "WEB_FORM_TITLE_SHOW" => "Y",
            "WEB_FORM_DESCRIPTION_SHOW" => "Y",
            "WEB_FORM_BACKGROUND" => "theme",
            "WEB_FORM_BACKGROUND_OPACITY" => "",
            "WEB_FORM_TEXT_COLOR" => "light",
            "WEB_FORM_POSITION" => "right",
            "WEB_FORM_ADDITIONAL_PICTURE_SHOW" => "Y",
            "WEB_FORM_ADDITIONAL_PICTURE" => "/images/forms/form.1/additional.png",
            "WEB_FORM_ADDITIONAL_PICTURE_HORIZONTAL" => "center",
            "WEB_FORM_ADDITIONAL_PICTURE_VERTICAL" => "bottom",
            "WEB_FORM_ADDITIONAL_PICTURE_SIZE" => "cover",
            "BLOCK_BACKGROUND" => "/images/forms/form.1/background.png",
            "BLOCK_BACKGROUND_PARALLAX_USE" => "N",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600000"
        ),
        false
    );?>
<?= Html::endTag('div') ?>
<?php

$render($blocks->get('categories'), ['path' => 'categories.2']);
$render($blocks->get('gallery'));
$render($blocks->get('reviews'));
$render($blocks->get('shares'));
$render($blocks->get('about'));
$render($blocks->get('stages'));
$render($blocks->get('collections'));
$render($blocks->get('video'));
$render($blocks->get('certificates'));
$render($blocks->get('faq'));
$render($blocks->get('videos'));
$render($blocks->get('brands'));
$render($blocks->get('instagram'));
$render($blocks->get('news'));
$render($blocks->get('contacts'));

?>

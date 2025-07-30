<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION; 

if ($_COOKIE['cookies_policy'] === 'true') {
    return;
}

$APPLICATION->IncludeComponent(
	"intec.universe:notifications", 
	".default", 
	array(
		"DESCRIPTION_TEXT" => "Мы используем файлы cookie, разработанные нашими специалистами и третьими лицами, для анализа событий на нашем веб-сайте. Продолжая просмотр страниц нашего сайта, вы принимаете условия его использования. Более подробные сведения смотрите <a href='/company/consent/'>в Политике конфиденциальности</a>.",
		"SLIM_MODE" => "Y",
		"LINK" => "/company/consent/",
		"LINK_TEXT" => "Подробнее",
		"ACCEPT_TEXT" => "Принимаю",
		"COMPONENT_TEMPLATE" => ".default",
		"SLIM_TITLE" => "Использование файлов Cookie"
	),
	false
);

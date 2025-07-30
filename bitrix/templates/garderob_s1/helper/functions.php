<?php

use Bitrix\Main\Loader;
use intec\core\helpers\Video;

/**
 * @param $url - YouTube video-URL
 * @return array URL-templates, preview picture, video-id
 */
function youtube_video($url)
{
    $arrUrl = Video::ParseUrl($url);

    return array(
        'iframe' => $arrUrl['LINKS']['embed'],
        'src' => $arrUrl['LINKS']['page'],
        'mqdefault' => $arrUrl['PICTURE']['mqdefault'],
        'hqdefault' => $arrUrl['PICTURE']['hqdefault'],
        'sddefault' => $arrUrl['PICTURE']['sddefault'],
        'image_maxresdefault' => $arrUrl['PICTURE']['maxresdefault'],
        'id' => $arrUrl['ID']
    );
}
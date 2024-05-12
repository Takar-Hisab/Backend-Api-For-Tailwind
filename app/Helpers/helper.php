<?php


if(!function_exists('getAvatar')){
    function getAvatar($name = null)
    {
        $avatar = new \Laravolt\Avatar\Avatar();
        return $avatar->create($name)->toBase64();
    }
}

if(!function_exists('loadAvatar')){
    function loadAvatar($name = 'unknown'): string
    {
        return "https://ui-avatars.com/api/?background=random&color=fff&name=$name";
    }
}

if(!function_exists('uniqueString')){
    function uniqueString($length=10): string
    {
        $str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result), 0, $length);
    }
}


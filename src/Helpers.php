<?php
namespace ShegunBabs\PayStack;

if ( !function_exists('call_url') )
{
    function call_url($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
    }
}
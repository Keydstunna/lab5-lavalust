<?php

function app_url($path = '')
{
    $base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
    return $base . '/' . ltrim($path, '/');
}
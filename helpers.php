<?php

function myLog($content)
{
    $filePath = 'my.log';
    $content = date("Y/m/d H:i:s") . " => " . print_r($content, true) . "\n";
    file_put_contents($filePath, $content, FILE_APPEND | LOCK_EX);
}

function dd($var)
{
    echo "<pre style='background-color: black; color: yellow; padding: 1em;' >";
    var_dump($var);
    echo "</pre>";
    die;
}
<?php

function getFirstNonRepeatedChar(string $str)
{
    $arrChars = str_split($str);
    $arrCount = [];
    foreach($arrChars as $char) {
        $arrCount[$char] = ++$arrCount[$char] ?? 1;
    }

    foreach($arrChars as $char) {
        if($arrCount[$char] === 1) {
            return $char;
            break;
        }
    }

    return null;
}

function getFirstRepeatedChar(string $str)
{
    $arrChars = str_split($str);
    $set = new Set();

    foreach($arrChars as $char) {
        if($set->contains($char)) {
            return $char;
            break;
        }

        $set->add($char);
    }
    
    return null;
}
<?php

function reverseString($str) {
    $stack = new Stack;
    foreach(str_split($str) as $char) {
        $stack->push($char);
    }
    $newStr = "";
    while(!$stack->empty()) {
        // to prevent huge amount  of string manipulation, we could use StringBuffers :)
        $newStr .= $stack->pop();
    }

    return $newStr;
}
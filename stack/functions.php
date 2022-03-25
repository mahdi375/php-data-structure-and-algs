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

/** TODO:
 * this is a long function
 * we could separate each if clouse to function or method if there is a OOP implementaion
 */
function checkBalance($str) {
    $pairs = [ '[' => ']', '(' => ')', '<' => '>', '{' => '}' ];

    $stack = new Stack;
    $opens = array_keys($pairs);
    $closes = array_values($pairs);

    foreach(str_split($str) as $char) {
        if(in_array($char, $opens)) {
            $stack->push($char);
        }

        if(in_array($char, $closes)) {
            if($pairs[$stack->pop()] !== $char) {
                return false;
                break;
            }
        }
    }

    return $stack->empty();
}

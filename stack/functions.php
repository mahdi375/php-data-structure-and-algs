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

function checkBalance($str) {
    $pairs = [ '[' => ']', '(' => ')', '<' => '>', '{' => '}' ];

    $counts = array_fill(0, count($pairs), 0);
    $opens = array_keys($pairs);
    $closes = array_values($pairs);

    foreach(str_split($str) as $char) {
        $index = array_search($char, $opens);
        if($index !== false) {
            $counts[$index]++;
        }

        $index = array_search($char, $closes);
        if($index !== false) {
            $counts[$index]--;
        }

        if($index !== false && $counts[$index] < 0) {
            return false;
            break;
        }
    }

    $nonZiroCounts = array_filter($counts, fn($count) => $count !== 0);

    return empty($nonZiroCounts);
}

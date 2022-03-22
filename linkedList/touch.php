<?php
require "./linkedList/LinkedList.php";

$linkedList = new LinkedList;

$linkedList->push('c');
$linkedList->push('d');
$linkedList->unshift('b');
$linkedList->unshift('a');
$linkedList->pop();
$linkedList->shift();
// $linkedList->shift();

dd($linkedList->getAsArray());
dd($linkedList->pop());
// dd($linkedList->shift());
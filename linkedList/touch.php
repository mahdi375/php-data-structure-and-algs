<?php
require "./linkedList/LinkedList.php";

$linkedList = new LinkedList;
$linkedList->push('c');
$linkedList->push('d');
$linkedList->unshift('b');
$linkedList->unshift('a');
// $linkedList->pop();
// $linkedList->shift();
// $linkedList->shift();
$linkedList->reverse();

dd($linkedList->getAsArray());
dd($linkedList->size());
dd($linkedList->pop());
// dd($linkedList->shift());
<?php

require "./binaryTrees/BinarySearch.php";

$tree = new BinarySearch;

$tree->insert(7);
$tree->insert(4);
$tree->insert(3);
$tree->insert(6);
$tree->insert(10);
$tree->insert(8);  
$tree->insert(11);  

// $tree->traversePreOrder(); // 7, 4, 3, 6, 10, 8, 11
// $tree->traverseInOrder(); // 3,4,6,7,8,10,11
// $tree->traversePostOrder(); // 3,6,4,8,11,10,7

dd($tree->height()); // 2
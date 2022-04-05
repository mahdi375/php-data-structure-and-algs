<?php

require "./binaryTrees/BinarySearch.php";

$tree = new BinarySearch;
$tree->insert(10);
$tree->insert(7);
$tree->insert(30);
$tree->insert(3);
$tree->insert(21);
$tree->insert(8);


dd($tree->isBST());
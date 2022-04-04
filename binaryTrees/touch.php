<?php

require "./binaryTrees/BinarySearch.php";

$tree = new BinarySearch;

$tree->insert(13);
$tree->insert(10);
// $tree->insert(15);
// $tree->insert(9);
// $tree->insert(11);
// $tree->insert(11);  

dd($tree->find(13));
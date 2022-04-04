<?php

require "./binaryTrees/BinarySearch.php";

$treeA = new BinarySearch;
$treeA->insert(4);
$treeA->insert(2);

$treeB = new BinarySearch;
$treeB->insert(4);
$treeB->insert(2);

dd($treeA->isEqual($treeB));
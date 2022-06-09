<?php

require "./AVLTrees/AVL.php";

$tree = new AVL();

$tree->insert(2);
$tree->insert(5);
$tree->insert(1);
$tree->insert(3);
$tree->insert(7);
$tree->insert(10);

print_r($tree->getRoot());
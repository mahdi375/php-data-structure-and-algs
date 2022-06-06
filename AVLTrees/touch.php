<?php

require "./AVLTrees/AVL.php";

$tree = new AVL();

$tree->insert(5);
$tree->insert(4);
$tree->insert(3);
$tree->insert(2);
$tree->insert(1);

// print_r($tree->getRoot());
<?php

require "./Heaps/Heap.php";
require "./Heaps/functoins.php";

$heap = new Heap();
$heap->insert(4);
$heap->insert(2);
$heap->insert(9);
$heap->insert(3);
$heap->insert(15);
$heap->insert(1);
$heap->insert(7);
$heap->insert(100);

// $heap->remove();

// print_r($heap->getItems());

$arr = [5, 3, 8, 4, 1, 2];
print_r(heapify($arr));

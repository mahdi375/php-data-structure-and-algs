<?php

require "./Heaps/Heap.php";

$heap = new Heap();
$heap->insert(8);
$heap->insert(4);
$heap->insert(9);
$heap->insert(5);
$heap->insert(3);
$heap->insert(6);
$heap->insert(24);
$heap->insert(100);
$heap->insert(7);

print_r($heap->getItems());
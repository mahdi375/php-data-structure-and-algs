<?php

function heapify(array $arr): array {
    $lastParentIndex = (count($arr)/2) - 1;
    for ($i = 0; $i <= $lastParentIndex; $i++) {
        $maxIndexInSubtree = maxIndexTripleRecursion($arr, $i);

        $temp = $arr[$maxIndexInSubtree];
        $arr[$maxIndexInSubtree] = $arr[$i];
        $arr[$i] = $temp;
    }

    return $arr;
}

function maxIndexTripleRecursion($heap, $index)
{
    $leftChildIndex = $index*2 + 1;
    $rightChildIndex = $index*2 + 2;

    $item = $heap[$index] ?? null;
    $leftChild = $heap[$leftChildIndex] ?? null;
    $rightChild = $heap[$rightChildIndex] ?? null;

    if(!$leftChild && !$rightChild) return $index;

    if(!$leftChild) {
        $maxIndexRight = maxIndexTripleRecursion($heap, $rightChildIndex);
        $maxRigh = $heap[$maxIndexRight];

        return $maxRigh > $item ? $maxIndexRight : $index;
    }

    if(!$rightChild) {
        $maxIndexLeft = maxIndexTripleRecursion($heap, $leftChildIndex);
        $maxRigh = $heap[$maxIndexLeft];

        return $maxRigh > $item ? $maxIndexLeft : $index;
    }

    $maxIndexRight = maxIndexTripleRecursion($heap, $rightChildIndex);
    $maxIndexLeft = maxIndexTripleRecursion($heap, $leftChildIndex);

    $maxRight = $heap[$maxIndexRight];
    $maxLeft = $heap[$maxIndexLeft];
    
    if($maxLeft > $maxRight && $maxLeft > $item) return $maxIndexLeft;
    if($maxRight > $item) return $maxIndexRight;

    return $index;
}
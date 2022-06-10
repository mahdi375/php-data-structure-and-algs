<?php

function heapify(array $arr): array {
    foreach($arr as $index => $value) {
        $maxIndexInSubtree = maxIndexTripleRexursion($arr, $index);

        $temp = $arr[$maxIndexInSubtree];
        $arr[$maxIndexInSubtree] = $arr[$index];
        $arr[$index] = $temp;
    }

    return $arr;
}

function maxIndexTripleRexursion($heap, $index)
{
    $leftChildIndex = $index*2 + 1;
    $rightChildIndex = $index*2 + 2;

    $item = $heap[$index] ?? null;
    $leftChild = $heap[$leftChildIndex] ?? null;
    $rightChild = $heap[$rightChildIndex] ?? null;

    if(!$leftChild && !$rightChild) return $index;

    if(!$leftChild) {
        $maxIndexRight = maxIndexTripleRexursion($heap, $rightChildIndex);
        $maxRigh = $heap[$maxIndexRight];

        return $maxRigh > $item ? $maxIndexRight : $index;
    }

    if(!$rightChild) {
        $maxIndexLeft = maxIndexTripleRexursion($heap, $leftChildIndex);
        $maxRigh = $heap[$maxIndexLeft];

        return $maxRigh > $item ? $maxIndexLeft : $index;
    }

    $maxIndexRight = maxIndexTripleRexursion($heap, $rightChildIndex);
    $maxIndexLeft = maxIndexTripleRexursion($heap, $leftChildIndex);

    $maxRight = $heap[$maxIndexRight];
    $maxLeft = $heap[$maxIndexLeft];
    
    if($maxLeft > $maxRight && $maxLeft > $item) return $maxIndexLeft;
    if($maxRight > $item) return $maxIndexRight;

    return $index;
}
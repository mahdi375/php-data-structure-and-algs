<?php

// $arr = [2, 3, 6, 2, 1, 1, 3, 5, 3, 2, 1]; // 6  2->7
// $arr = [2,1,1,3,2,1,1,3]; // 3
// $arr = [4, 4, 4, 4, 7, 3, 4, 8, 3, 0, 3, 3, 4, 4, 4]; // 6
$arr = [1, 1, 1, 2, 3, 4, 5, 6, 7, 8, 2, 2, 2, 4, 4, 4, 5, 5, 1, 2, 3, 4, 5, 6, 7, 8, 9]; // 9

function smalestInclusiveArrayLength(array $arr) {
    $uniques = array_unique($arr);
    $length = count($arr);

    $lengths = [];

    foreach($arr as $k => $v) {
        $slicedArr = [];

        for($i = $k; $i < $length; $i++) {
            $slicedArr[] = $arr[$i];

            if(arrayContainsAll($slicedArr, $uniques)) {
                $lengths[] = count($slicedArr);
                break;
            }
        }

    }

    return min($lengths);
}

function arrayContainsAll(array $big, array $small) {
    foreach($small as $bit) {
        if(!in_array($bit, $big)) {
            return false;
        }
    }

    return true;
}

echo smalestInclusiveArrayLength($arr)."\n";
<?php
require "./hashtable/Set.php";
require "./hashtable/functions.php";

// dd(getFirstNonRepeatedChar("m  ahdimiahdm"));

// dd(getFirstRepeatedChar(" m mahdioi"));
$arr = [];

for($i=0; $i < 60; $i++) {
    $arr[hash_algos()[$i]] = hash(hash_algos()[$i], "mahdi");
}

dd($arr);
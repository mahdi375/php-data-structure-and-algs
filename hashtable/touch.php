<?php
require "./hashtable/Set.php";
require "./hashtable/functions.php";
require "./hashtable/HashTable.php";

// dd(getFirstNonRepeatedChar("m  ahdimiahdm"));

// dd(getFirstRepeatedChar(" m mahdioi"));

$hashTable = new HashTable();

$hashTable->put(1, "a");
$hashTable->put(3, "b");
$hashTable->put(21, "bar");
$hashTable->put(11, "foo");
// $hashTable->remove(11);

dd($hashTable->get(11));
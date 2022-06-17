<?php

require "./Tries/Trie.php";

$trie = new Trie();

$trie->insert("cat");
$trie->insert("cate");
$trie->insert("car");
$trie->insert("boy");

$trie->delete('cate');
$trie->delete('car');

// $trie->tranverse();

print_r($trie);

// echo substr("mahdi", 1, 1);
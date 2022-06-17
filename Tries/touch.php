<?php

require "./Tries/Trie.php";

$trie = new Trie();

$trie->insert("car");
$trie->insert("care");
$trie->insert("careful");
$trie->insert("card");
$trie->insert("egg");

// $trie->delete('cate');
// $trie->delete('car');

// $trie->tranverse();


print_r($trie->autoComplete('care'));

// echo substr("mahdi", 1, 1);
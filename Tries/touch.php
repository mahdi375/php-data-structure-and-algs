<?php

require "./Tries/Trie.php";

$trie = new Trie();

$trie->insert("cat");
$trie->insert("car");
$trie->insert("boy");
$trie->insert("baby");
$trie->insert("calendar");


// var_dump($trie->contains(''));

print_r(str_split(''));
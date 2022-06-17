<?php

require "./Tries/TrieNode.php";

class Trie
{
    private TrieNode $root;

    public function __construct()
    {
        $this->root = new TrieNode(null);
    }

    public function insert(string $word)
    {
        $current = $this->root;

        foreach(str_split($word) as $key => $char)
        {
            if (!$current->has($char)) $current->set($char);
            $current = $current->get($char);
        }

        $current->endOfWord();
    }

    public function contains(string $word): bool
    {
        $current = $this->root;

        foreach(str_split($word) as $char) {
            if(!$current->has($char)) return false;
            $current = $current->get($char);
        }

        return $current->isEndOfWord;
    }

    public function tranverse()
    {
        $this->tranverseRec($this->root, '');
    }

    private function tranverseRec(TrieNode $root, string $string)
    {
        echo $root->value . " \n";

        foreach($root->children as $node) {
            $this->tranverseRec($node, $string.$node->value);
        }

        // if($root->isEndOfWord) {
        //     echo $string . " \n";
        // }
    }

    public function __toString()
    {
        //FIXME:
    }
}
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

    public function delete(string $word)
    {
        $this->deleteRec($this->root, $word, 0);
    }

    private function deleteRec(TrieNode $root, string $word, int $current): void
    {
        if ($current == strlen($word)) { // end of word
            $root->notEndOfChild();
            return;
        }

        $char = substr($word, $current, 1);
        $child = $root->get($char);

        if(!$child) return;

        $this->deleteRec($child, $word, $current + 1);

        // has not child and is not end of other words
        if (!$child->hasChild() && !$child->isEndOfWord) {
            $root->deleteChild($child);
        }
    }

    public function tranverse()
    {
        $this->tranverseRec($this->root, '');
    }

    private function tranverseRec(TrieNode $root, string $string)
    {
        foreach($root->children as $node) {
            $this->tranverseRec($node, $string.$node->value);
        }

        if($root->isEndOfWord) {
            echo $string . " \n";
        }
    }

    public function __toString()
    {
        //FIXME:
    }
}
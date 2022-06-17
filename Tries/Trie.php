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
        $node = $root->get(substr($word, $current, 1));

        if ($current == strlen($word)) return;

        $this->deleteRec($node, $word, $current + 1);

        if (!$node->hasChild()) {
            if($node->isEndOfWord && ($current+1 !== strlen($word))) return;
            $root->deleteChild($node);
        } else {
            $node->notEndOfChild();
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
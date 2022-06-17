<?php

class TrieNode
{
    public ?string $value;
    public bool $isEndOfWord;
    public array $children = [];

    public function __construct(?string $value, bool $isEndOfWord = false)
    {
        $this->value = $value;
        $this->isEndOfWord = $isEndOfWord;
    }

    public function has(string $char): bool
    {
        foreach($this->children as $node) {
            if($node->value === $char) return true;
        }

        return false;
    }

    public function get(string $char): ?TrieNode
    {
        foreach($this->children as $node) {
            if($node->value === $char) return $node;
        }

        return null;
    }

    public function set(string $char): void
    {
        $index = ord($char) - ord('a');
        $node = new self($char);
        $this->children[$index] = $node;
    }

    public function endOfWord(): void
    {
        $this->isEndOfWord = true;
    }

}
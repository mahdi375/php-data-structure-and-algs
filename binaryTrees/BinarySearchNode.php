<?php

class BinarySearchNode
{
    public int $value;
    public ?self $rightNode = null;
    public ?self $leftNode = null;

    public function __construct(int $value)
    {
        $this->value = $value;
    }
}
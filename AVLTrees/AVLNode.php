<?php

class AVLNode
{   
    public ?self $left = null;
    public ?self $right = null;

    public function __construct(public readonly int $value)
    {
    }

    public function leftIsNull(): bool
    {
        return is_null($this->left);
    }

    public function rightIsNull(): bool
    {
        return is_null($this->right);
    }

    public function is(self $node)
    {
        return $this->value === $node->value;
    }

    public function valueIsGreaterThan(int $value)
    {
        return $this->value > $value;
    }
}
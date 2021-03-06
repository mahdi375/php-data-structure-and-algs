<?php

class AVLNode
{   
    public ?self $left = null;
    public ?self $right = null;
    public int $height = 0;

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

    public function itValueIsGreaterThan(int $value)
    {
        return $this->value > $value;
    }

    public function refreshHeight()
    {
        $this->height = 1 + max($this->left->height ?? -1, $this->right->height ?? -1);
    }

    public function balanceFactore(): int
    {
        return ($this->left->height ?? -1) - ($this->right->height ?? -1);
    }

    public function isLeftHeavy(): bool
    {
        return $this->balanceFactore() > 1;
    }

    public function isRightHeavy(): bool
    {
        return $this->balanceFactore() < -1;
    }
}
<?php
/**
 * LIFO rule
 * array/linked list wrapper
 * has not lookup method ....
 */
class Stack
{
    private $items = [];

    // O(1)
    public function push($item)
    {
        array_push($this->items, $item);
    }

    // O(1)
    public function pop()
    {
        return array_pop($this->items);
    }

    // O(1)
    public function peek()
    {
        return $this->items[array_key_last($this->items)];
    }

    // O(1)
    public function empty()
    {
        return count($this->items) === 0;
    }
}
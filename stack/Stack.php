<?php

class Stack
{
    private $items = [];

    public function push($item)
    {
        array_push($this->items, $item);
    }

    public function pop()
    {
        return array_pop($this->items);
    }

    public function peek()
    {
        return $this->items[array_key_last($this->items)];
    }

    public function empty()
    {
        return count($this->items) === 0;
    }
}
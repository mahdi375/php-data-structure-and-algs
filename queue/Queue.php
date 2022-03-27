<?php

class Queue
{
    private $items = [];
    private $capacity = 10;
    private $count = 0;

    public function enqueue($item)
    {
        if($this->isFull()) {
            throw new OverflowException('queue is full');
        }
        array_push($this->items, $item);
        $this->count++;
    }

    public function dequeue()
    {
        if($this->isEmpty()) {
            return null;
            // throw new UnderflowException('queue is empty');
        }

        $this->count--;
        return array_shift($this->items);
    }

    public function isFull()
    {
        return $this->capacity === $this->count;
    }

    public function isEmpty()
    {
        return (bool) !$this->count;
    }

    public function peek()
    {
        return current($this->items);
    }
}
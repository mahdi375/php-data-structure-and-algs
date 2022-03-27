<?php

class Queue
{
    private $items;
    private $size;
    private $count;
    private $front;
    private $rear;

    public function __construct(int $size)
    {
        $this->size = $size;
        $this->items = new SplFixedArray($size);
        $this->count = $this->front = $this->rear = 0;
    }

    public function enqueue($item)
    {
        if($this->isFull()) {
            throw new OverflowException('queue is full');
        }
        
        $this->items->offsetSet($this->rear, $item);
        $this->rear = ($this->rear + 1) % $this->size;
        $this->count++;
    }

    public function dequeue()
    {
        if($this->isEmpty()) {
            return null;
        }

        $item = $this->items->offsetGet($this->front);
        $this->front = ($this->front + 1) % $this->size;
        $this->count--;

        return $item;
    }

    public function isFull()
    {
        return $this->size === $this->count;
    }

    public function isEmpty()
    {
        return (bool) !$this->count;
    }

    public function peek()
    {
        return $this->items->offsetGet($this->front);
    }
}
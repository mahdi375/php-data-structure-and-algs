<?php

/**
 * Jobs will be processed base on their priority
 */
class PriorityQueue
{
    public $items;
    private $size;
    private $count;

    public function __construct(int $size)
    {
        $this->size = $size;
        $this->items = [];
        $this->count = $this->front = $this->rear = 0;
    }

    public function enqueue($obj, $priority)
    {
        if($this->isFull()) {
            throw new OverflowException('queue is full');
        }

        $index = $this->findIndex($priority);
        $firstPart = array_slice($this->items,0,  $index);
        $secondPart = array_slice($this->items, $index);
        $firstPart[$index] = ['priority' => $priority, 'obj' => $obj];
        $this->items = [...$firstPart, ...$secondPart];

        $this->count++;
    }

    private function findIndex($priority)
    {
        $count = 0;
        foreach($this->items as $index => $item) {
            $count++;
            if($item['priority'] >= $priority) {
                return (int) $index;
            }
        }

        return $count; // better than count($this->items)
    }

    public function dequeue()
    {
        if($this->isEmpty()) {
            return null;
        }

        $item = array_pop($this->items);
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
        return end($this->items);
    }
}
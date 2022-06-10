<?php

class Heap
{
    private array $items = [];
    private int $size = 0;

    public function insert(int $value)
    {
        $this->bubbleUp($value, $this->size);
        $this->size++;
    }

    public function remove(): int
    {
        if($this->size === 0) {
            throw new InvalidArgumentException("there is no item to remove");
        }

        $value = $this->items[0];
        $this->size--;

        if($this->size > 0) {
            $this->items[0] = array_pop($this->items);
            $this->bubbleDown(0);
        } else {
            array_shift($this->items);
        }

        return $value;
    }

    private function bubbleDown(int $index)
    {
        $leftIndex = $index*2 + 1;
        $rightIndex = $index*2 + 2;

        $value = $this->items[$index];
        $left = $this->items[$leftIndex] ?? null;
        $right = $this->items[$rightIndex] ?? null;

        
        if($left >= $right && $left > $value) {
            $this->items[$index] = $left;
            $this->items[$leftIndex] = $value;
            $this->bubbleDown($leftIndex);
        } elseif ($right >= $left && $right > $value) {
            $this->items[$index] = $right;
            $this->items[$rightIndex] = $value;
            $this->bubbleDown($rightIndex);
        }
    }

    private function bubbleUp( int $value, int $index)
    {
        if($index === 0) {
            $this->items[0] = $value;
            return;
        }

        $parentIndex = floor(($index-1)/2);
        $parent = $this->items[$parentIndex];

        if ($parent < $value) {
            $this->bubbleUp($value, $parentIndex);
            $this->bubbleUp($parent, $index);
        } else {
            $this->items[$index] = $value;
        }
    }

    public function getItems()
    {
        return $this->items;
    }
}
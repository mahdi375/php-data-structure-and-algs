<?php

class Heap
{
    private array $items = [];
    private int $size = 0;

    public function insert(int $value)
    {
        $this->putAt($value, $this->size);
        $this->size++;
    }

    private function putAt( int $value, int $index)
    {
        if($index === 0) {
            $this->items[0] = $value;
            return;
        }

        $parentIndex = floor(($index-1)/2);
        $parent = $this->items[$parentIndex];

        if ($parent < $value) {
            $this->putAt($value, $parentIndex);
            $this->putAt($parent, $index);
        } else {
            $this->items[$index] = $value;
        }
    }

    public function getItems()
    {
        return $this->items;
    }
}
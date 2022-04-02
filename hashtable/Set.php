<?php

class Set
{
    public $items = [];

    public function add($item)
    {
        if(!$this->contains($item)) {
            $this->items[] = $item;
        }
    }

    public function remove($item)
    {
        if(!$index = $this->getIndex($item)) {
            throw new InvalidArgumentException('item not found to remove');
        }
        
        unset($this->items[$index]);
    }

    public function contains($item)
    {
        return $this->getIndex($item) !== false;
    }

    private function getIndex($item)
    {
        return array_search($item, $this->items);
    }

    public function get($index)
    {
        if(!isset($this->items[$index])) {
            throw new InvalidArgumentException('index is not set');
        }

        return $this->items[$index];
    }
}
<?php

require "./linkedList/Node.php";

/**
 * php has SplDoublyLinkedList too ....
 */

class LinkedList
{
    private Node|null $tail = null;
    private Node|null $head = null;
    private $count = 0;

    // O(1)
    private function isEmpty()
    {
        return  (bool) !$this->head;
    }

    // O(1)
    public function push($value)
    {
        $node = new Node($value, null);

        if($this->isEmpty()) {
            $this->head = $this->tail = $node;
        } else {
            $this->tail->next = $node;
            $this->tail = $node;
        }

        $this->count++;
    }

    // O(1)
    public function unshift($value)
    {
        $node = new Node($value, null);

        if($this->isEmpty()) {
            $this->head = $this->tail = $node;
        }else {
            $node->next = $this->head;
            $this->head = $node;
        }

        $this->count++;
    }

    // O(n)
    public function pop()
    {
        if($this->isEmpty()) {
            return throw new LengthException('cant pop on empty linked list!');
        }

        $node = $this->tail;

        // there is only one item
        if($this->count === 1) {
            $this->head = $this->tail = null;
        } else {
            $previous = $this->getPrevious($node);
            $previous->next = null;
            $this->tail = $previous;
        }
        
        $this->count--;

        return $node->data;
    }

    // O(1)
    public function shift()
    {
        if($this->isEmpty()) {
            return throw new LengthException('cant shift on empty linked list!');
        }

        $node = $this->head;
        $this->head = $node->next ?? null;
        
        $this->count--;

        return $node->data;
    }

    // O(n)
    public function contains($value)
    {
        return $this->indexOf($value) !== -1;
    }

    // O(n)
    public function indexOf($value)
    {
        $index = 0;
        $pointer = $this->head;

        while($pointer) {
            if($pointer->data === $value) {
                return $index;
            }
            $pointer = $pointer->next;
            $index++;
        }

        return -1;
    }

    // O(1)
    public function size()
    {
        return $this->count;
    }

    // O(n)
    public function getAsArray()
    {
        $node = $this->head;
        $output = [];
        while ($node) {
            $output[] = $node->data;
            $node = $node->next;
        }

        return $output;
    }

    // O(n)
    private function getPrevious(Node $node)
    {
        $pointer = $this->head;
        while($pointer) {
            if($pointer->next === $node) {
                return $pointer;
                break;
            }

            $pointer = $pointer->next;
        }

        return throw new InvalidArgumentException('previous node not found!');
    }

    public function reverse()
    {
        if($this->isEmpty()) {
            return;
        }

        $start = $this->tail;
        $end = $this->head;

        $node = $start;

        for($i = $this->count - 1; $i >= 0; $i--) {
            $node->next = $this->getNodeByIndex($i);
            $node = $node->next;
        }

        $end->next = null;
        $this->head = $start;
        $this->tail = $end;
    }

    private function getNodeByIndex($index)
    {
        $current = 0;
        $node = $this->head;

        while($node) {
            if($index == $current) {
                return $node;
                break;
            }
            $current++;
            $node = $node->next;
        }
    }
}
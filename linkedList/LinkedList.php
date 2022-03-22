<?php

require "./linkedList/Node.php";

/**
 * php has SplDoublyLinkedList too ....
 */

class LinkedList
{
    private Node|null $tail = null;
    private Node|null $head = null;

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
    }

    // O(n)
    public function pop()
    {
        if($this->isEmpty()) {
            return throw new LengthException('cant pop on empty linked list!');
        }

        $node = $this->tail;

        // there is only one item
        if($this->tail === $this->head) {
            $this->head = $this->tail = null;

            return $node->data;
        }

        $previous = $this->getPrevious($node);
        $previous->next = null;
        $this->tail = $previous;
        
        return $node->data;
    }

    // O(1)
    public function shift()
    {
        $node = $this->head;
        $this->head = $node->next ?? null;
        return $node->data ?? null;
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

    // O(n)
    public function count()
    {
        return count($this->getAsArray());
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
}
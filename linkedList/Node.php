<?php

class Node
{
    public $data;
    public Node|null $next;

    public function __construct($data, Node|null $next)
    {
        $this->data = $data;
        $this->next = $next;
    }

}
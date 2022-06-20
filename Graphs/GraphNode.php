<?php

class GraphNode
{
    private array $edges = [];

    public function __construct(public string $label)
    {
    }

    public function addEdge(string $label)
    {
        $index = array_search($label, $this->edges);

        if($index === false) {
            $this->edges[] = $label;
        }
    }

    public function removeEdge(string $label)
    {
        $index = array_search($label, $this->edges);

        if($index !== false) {
            unset($this->edges[$index]);
        }
    }

    public function getEgdes()
    {
        return $this->edges;
    }
}
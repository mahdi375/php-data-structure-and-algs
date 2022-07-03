<?php

require "./UndirectedGraph/WeightGraphEdge.php";

class WeightGraphNode
{
    private array $edges = []; // $label => Edge $edge

    public function __construct(private string $label)
    {
    }

    public function addEdge(string $to, int $weight)
    {
        $edge = new WeightGraphEdge($this->label, $to, $weight);
        $this->edges[$to] = $edge;
    }

    public function getLabel()
    {
        return $this->label;
    }
    public function getEdges()
    {
        return $this->edges;
    }  
}
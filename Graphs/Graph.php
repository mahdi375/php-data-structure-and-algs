<?php

require "./Graphs/GraphNode.php";

class Graph
{
    public array $list = [];

    public function addNode(string $label)
    {
        $this->list[$label] = new GraphNode($label);
    }

    public function removeNode($label)
    {
        $target = $this->list[$label] ?? null;
        if(!$target) return;

        // remove edges
        foreach($this->list as $node)
        {
            $node->removeEdge($label);
        }

        // remove node
        unset($this->list[$label]);
    }

    public function addEdge(string $from, string $to)
    {
        $node = $this->list[$from];
        if(!($this->list[$to] ?? false)) throw new OutOfRangeException("{$to} was not found!");
        $node->addEdge($to);
    }

    public function removeEdge(string $from, string $to)
    {
        $node = $this->list[$from];
        if(!($this->list[$to] ?? false)) throw new OutOfRangeException("{$to} was not found!");
        $node->removeEdge($to);
    }

    public function print()
    {
        foreach($this->list as $label => $node) {
            $edges = implode(", ", $node->getEgdes());
            echo "{$label} neighbors are: {$edges} \n";
        }
    }
}
<?php

require "./Graphs/GraphNode.php";
require "./hashtable/Set.php";

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

    public function traverseDepthFirstUsingRecursion(string $from)
    {
        if(!($this->list[$from] ?? false)) throw new OutOfRangeException("{$from} not found");

        return $this->depthFirstRec($from, new Set());
    }

    private function depthFirstRec(string $label, Set $visiteds)
    {
        $visiteds->add($label);

        $node = $this->list[$label];
        foreach($node->getEdges() as $label) {
            if(!$visiteds->contains($label)) {
                $visiteds = $this->depthFirstRec($label, $visiteds);
            }
        }

        return $visiteds;
    }

    public function traverseDepthFirstUsingIteration(string $from)
    {
        if(!($this->list[$from] ?? false)) throw new OutOfRangeException("{$from} not found");

        $stack = [];
        array_push($stack, $from);
        $visiteds = new Set();

        while (count($stack)) {
            $current = array_pop($stack);
            $visiteds->add($current);
            $node = $this->list[$from];

            foreach($node->getEdges() as $label) {
                if(!$visiteds->contains($label)) {
                    array_push($stack, $label);
                }
            }
        }

        return $visiteds;
    }

    public function print()
    {
        foreach($this->list as $label => $node) {
            $edges = implode(", ", $node->getEgdes());
            echo "{$label} neighbors are: {$edges} \n";
        }
    }
}
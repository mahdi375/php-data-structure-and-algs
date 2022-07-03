<?php

require "./UndirectedGraph/WeightGraphNode.php";

class WeightGraph
{
    private array $nodes = [];// label => Node $node

    public function addNode(string $label)
    {
        if($this->contains($label)) throw new Exception("$label already exists !");

        $this->nodes[$label] = new WeightGraphNode($label);
    }

    public function addEdge(string $from, string $to, int $weight)
    {
        if(!$this->contains($from) || !$this->contains($to)) throw new Exception("$from/$to does not exists");

        $from = $this->nodes[$from];
        $to = $this->nodes[$to];

        $from->addEdge($to->getLabel(), $weight);
        $to->addEdge($from->getLabel(), $weight);
    }

    public function contains(string $label)
    {
        return array_key_exists($label, $this->nodes);
    }

    public function getList()
    {
        return $this->nodes;
    }

    public function print()
    {
        foreach($this->nodes as $label => $node) {
            $edges = '';
            foreach($node->getEdges() as $edge) {
                $edges .= " {$edge->to}: {$edge->weight},";
            }

            echo "{$label} => {$edges} \n";
        }
    }
}
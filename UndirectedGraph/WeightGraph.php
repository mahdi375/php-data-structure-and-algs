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

    // Using => Dijkstra
    public function shortesPath(string $from, string $to)
    {
        $distances = []; // $label => int $distance
        $previous = []; // $label => $label;
        $visited = [];// => $label

        foreach($this->nodes as $label => $node) {
            $distances[$label] = INF;
        }
        $distances[$from] = 0;

        $queue = new SplPriorityQueue();
        $queue->insert($from, 0);

        while(!$queue->isEmpty()) {
            $current = $this->nodes[$queue->extract()];
            $visited[] = $current->getLabel();

            foreach($current->getEdges() as $edge) {
                // if reach $to => Done
                if($current->getLabel() === $to) break;
                
                $neighbour = $this->nodes[$edge->to];
                if(in_array($neighbour->getLabel(), $visited)) continue;
                    
                // total dis = dis(prev_node, source) + dis(current, prev_node)
                $totalDist = $distances[$current->getLabel()] + $edge->weight;
                    
                // if total distance < latest distance
                    // replace new distance and prev node
                    // push to queue
                if($totalDist < $distances[$neighbour->getLabel()]) {
                    $priority = -$totalDist; // to less distance have more priority
                    $queue->insert($neighbour->getLabel(), $priority);
                    $distances[$neighbour->getLabel()] = $totalDist;
                    $previous[$neighbour->getLabel()] = $current->getLabel();
                }
            }
        }

        $path = [];
        $current = $to;
        $path[] = $to;
        
        while(!in_array($from, $path)) {
            $current = $previous[$current];
            array_unshift($path, $current);
        }

        return ['distances' => $distances[$to], 'path' => $path];
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
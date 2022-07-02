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
            $current = array_pop($stack);// delete from end
            $visiteds->add($current);
            $node = $this->list[$current];

            foreach($node->getEdges() as $label) {
                if(!$visiteds->contains($label)) {
                    array_push($stack, $label); // add to end
                }
            }
        }

        return $visiteds;
    }

    public function traverseBreadthFirst(string $from)
    {
        if(!($this->list[$from] ?? false)) throw new OutOfRangeException("{$from} not found");

        $queue = []; // we user php array as Queue;
        array_push($queue, $from);
        $visiteds = new Set();

        while(count($queue)) {
            $current = array_pop($queue); // delete from end (front of queue)
            $visiteds->add($current);
            $node = $this->list[$current];

            foreach($node->getEdges() as $label) {
                if(!$visiteds->contains($label)) {
                    array_unshift($queue, $label); // add to begining (end of queue)
                }
            }
        }

        return $visiteds;
    }

    public function topologicalSort()
    {
        $stack = [];// we use array instead of stack

        foreach($this->list as $label => $node)
        {
            $stack = $this->topologicalSortRecu($node, $stack);
        }

        return $stack;
    }

    private function topologicalSortRecu(GraphNode $node, $stack)
    {
        if(in_array($node->label, $stack)) return $stack;

        foreach($node->getEdges() as $label) {
            $child = $this->list[$label];
            $stack = $this->topologicalSortRecu($child, $stack);
        }

        // $allChildrenVisted = count($node->getEdges()) === count(array_intersect($node->getEdges(), $stack));
        // if($allChildrenVisted) {
            $stack[] = $node->label;
        // }

        return $stack;
    }
    
    public function hasCycle()
    {
        // we must use HashSet... :(
        $visitings = [];
        $visiteds = [];
        
        foreach($this->list as $label => $node) {
            [$visitings, $visiteds, $hasCycle] = $this->hasCycleRecu($node, $visitings, $visiteds);

            if($hasCycle) return true;
        }

        return false;
    }

    private function hasCycleRecu(GraphNode $node, $visitings, $visiteds, $hasCycle = false)
    {
        $hasCycle = in_array($node->label, $visitings) ? true : $hasCycle;

        if(in_array($node->label, $visiteds) || $hasCycle) return [$visitings, $visiteds, $hasCycle];

        $visitings[] = $node->label;
        
        foreach($node->getEdges() as $label) {
            $child = $this->list[$label];
            
            [$visitings, $visiteds, $hasCycle] = $this->hasCycleRecu($child, $visitings, $visiteds, $hasCycle);
        }

        $index = array_search($node->label, $visitings);
        unset($visitings[$index]);
        $visiteds[] = $node->label;
        
        return [$visitings, $visiteds, $hasCycle];
    }

    public function print()
    {
        foreach($this->list as $label => $node) {
            $edges = implode(", ", $node->getEdges());
            echo "{$label} neighbors are: {$edges} \n";
        }
    }
}
<?php 

require "./Graphs/Graph.php";

$graph = new Graph();

$graph->addNode('X');
$graph->addNode('A');
$graph->addNode('B');
$graph->addNode('P');

$graph->addEdge('X', 'A');
$graph->addEdge('X', 'B');
$graph->addEdge('A', 'P');
$graph->addEdge('B', 'P');
$graph->addEdge('P', 'X');

// $graph->print();
var_dump($graph->hasCycle());
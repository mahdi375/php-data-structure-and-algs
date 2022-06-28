<?php 

require "./Graphs/Graph.php";

$graph = new Graph();

$graph->addNode('A');
$graph->addNode('B');
$graph->addNode('C');
$graph->addNode('D');
$graph->addNode('E');
$graph->addNode('F');

$graph->addEdge('A', 'B');
$graph->addEdge('A', 'C');
$graph->addEdge('B', 'D');
$graph->addEdge('B', 'F');
$graph->addEdge('D', 'C');
$graph->addEdge('C', 'E');

// $graph->print();
print_r($graph->traverseBreadthFirst('A'));
<?php 

require "./Graphs/Graph.php";

$graph = new Graph();

$graph->addNode('A');
$graph->addNode('B');
$graph->addNode('C');
$graph->addNode('D');

$graph->addEdge('A', 'B');
$graph->addEdge('B', 'D');
$graph->addEdge('A', 'D');
$graph->addEdge('C', 'A');
$graph->addEdge('C', 'D');

print_r($graph->traverseDepthFirstUsingRecursion('A'));
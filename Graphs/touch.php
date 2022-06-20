<?php 

require "./Graphs/Graph.php";

$graph = new Graph();

$graph->addNode('Mahdi');
$graph->addNode('Milad');
$graph->addNode('Ahmad');

$graph->addEdge('Mahdi', 'Milad');
$graph->addEdge('Mahdi', 'Ahmad');
$graph->addEdge('Milad', 'Ahmad');

$graph->removeNode('Ahmad');

$graph->print();
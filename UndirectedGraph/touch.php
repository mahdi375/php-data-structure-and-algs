<?php

use function PHPSTORM_META\type;

require "./UndirectedGraph/WeightGraph.php";

$weightedGraph = new WeightGraph();

$weightedGraph->addNode("A");
$weightedGraph->addNode("B");

$weightedGraph->addNode("C");
$weightedGraph->addNode("D");
$weightedGraph->addNode("E");

$weightedGraph->addEdge("A", "B", 2);

$weightedGraph->addEdge("C", "D", 2);
$weightedGraph->addEdge("D", "E", 2);
$weightedGraph->addEdge("E", "C", 2);



var_dump($weightedGraph->hasCycle());
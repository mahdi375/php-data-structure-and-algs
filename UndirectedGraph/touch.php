<?php

use function PHPSTORM_META\type;

require "./UndirectedGraph/WeightGraph.php";

$weightedGraph = new WeightGraph();

$weightedGraph->addNode("A");
$weightedGraph->addNode("B");
$weightedGraph->addNode("C");
$weightedGraph->addNode("D");
$weightedGraph->addNode("E");
$weightedGraph->addNode("F");
$weightedGraph->addNode("G");
$weightedGraph->addNode("H");
$weightedGraph->addNode("I");

$weightedGraph->addEdge("A", "F", 2);
$weightedGraph->addEdge("A", "D", 1);
$weightedGraph->addEdge("A", "E", 4);
$weightedGraph->addEdge("A", "B", 2);

$weightedGraph->addEdge("B", "C", 1);
$weightedGraph->addEdge("B", "E", 3);

$weightedGraph->addEdge("C", "I", 5);

$weightedGraph->addEdge("D", "E", 2);
$weightedGraph->addEdge("D", "F", 3);
$weightedGraph->addEdge("D", "H", 5);

$weightedGraph->addEdge("E", "H", 3);
$weightedGraph->addEdge("E", "I", 1);

$weightedGraph->addEdge("F", "H", 4);
$weightedGraph->addEdge("F", "G", 4);

$weightedGraph->addEdge("H", "G", 1);
$weightedGraph->addEdge("H", "I", 4);


// $weightedGraph->print();
print_r($weightedGraph->shortesPath('A', 'I'));
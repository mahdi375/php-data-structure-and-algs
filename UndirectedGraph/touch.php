<?php

require "./UndirectedGraph/WeightGraph.php";

$weightedGraph = new WeightGraph();

$weightedGraph->addNode("A");
$weightedGraph->addNode("B");
$weightedGraph->addNode("C");

$weightedGraph->addEdge("A", "B", 3);
$weightedGraph->addEdge("B", "A", 4);

$weightedGraph->addEdge("C", "A", 5);



$weightedGraph->print();
// print_r($weightedGraph->getList());
<?php 

require "./Graphs/Graph.php";

$graph = new Graph();

/**         
 *          A1 
 *      A    
 *          A2 
 *   X              P        
 *          B 
 */

$graph->addNode('X');
$graph->addNode('A');
$graph->addNode('A1');
$graph->addNode('A2');
$graph->addNode('B');
$graph->addNode('P');

$graph->addEdge('X', 'A');
$graph->addEdge('X', 'B');
$graph->addEdge('B', 'P');
$graph->addEdge('A', 'A2');
$graph->addEdge('A', 'A1');
$graph->addEdge('A1', 'P');
$graph->addEdge('A2', 'P');

// $graph->print();
print_r($graph->topologicalSort());
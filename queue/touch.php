<?php

require "./queue/Queue.php";
require "./queue/QueueByStack.php";
require "./queue/PriorityQueue.php";

$queue = new PriorityQueue(5);

// $queue->enqueue("c", 3);
$queue->enqueue("d", 4);
// $queue->enqueue("e", 5);
// $queue->enqueue("b", 2);
$queue->enqueue("a", 1);

$queue->dequeue();
dd($queue->dequeue());

// dd($queue->items);

dd($queue->peek());

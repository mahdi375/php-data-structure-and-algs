<?php

require "./queue/Queue.php";
// require "./queue/functions.php";

$queue = new Queue;

for($i = 0; $i <= 100; $i++) {
    if($queue->isFull()) {
        $queue->dequeue();
    }

    $queue->enqueue($i);
}

dd(array_keys($queue->peek()));

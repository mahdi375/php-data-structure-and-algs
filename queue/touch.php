<?php

require "./queue/Queue.php";
// require "./queue/functions.php";

$queue = new Queue(10);

$queue->enqueue(21);
$queue->enqueue(22);
$queue->enqueue(23);

$queue->dequeue();
dd($queue->dequeue());

dd($queue->peek());

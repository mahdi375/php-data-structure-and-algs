<?php

require "./stack/Stack.php";

class QueueByStack
{
    private $enqStack;
    private $deqStack;

    public function __construct()
    {
        $this->enqStack = new Stack;
        $this->deqStack = new Stack;
    }

    public function enqueue($item)
    {
        $this->enqStack->push($item);
    }

    public function dequeue()
    {
        $this->checkDequeueStack();

        return $this->deqStack->pop();
    }

    public function peek()
    {
        $this->checkDequeueStack();

        return $this->deqStack->peek();
    }

    private function checkDequeueStack()
    {
        if($this->deqStack->empty()) {
            $this->popEnqueueToDequeueStack();
        }
    }

    private function popEnqueueToDequeueStack()
    {
        while(!$this->enqStack->empty()) {
            $this->deqStack->push($this->enqStack->pop());
        }
    }
}
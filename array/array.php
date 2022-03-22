<?php

class myArr 
{

    public $arr;

    public function __construct(array $arr)
    {
        $this->arr = $arr;
    }

    public function lookup(int $index) 
    {
        return $this->arr[$index];
    }

    public function insert($value)
    {
        array_push($this->arr, $value);
    }

    public function delete(int $index)
    {
        $this->arr = array_slice($this->arr, $index, 1);
    }
}

function microMetter(myArr $arr)
{
    $index = rand(0, count($arr->arr) - 1);

    $lookUpStart = microtime(true);
    $found = $arr->lookup($index);
    $lookUpDuration = microtime(true) - $lookUpStart;

    $insertStart = microtime(true);
    $arr->insert(45);
    $insertDuration = microtime(true) - $insertStart;

    $deleteStart = microtime(true);
    $arr->delete($index);
    $deleteDuration = microtime(true) - $deleteStart;

    return [
        'look_up' => $lookUpDuration,
        'insert' => $insertDuration,
        'delete' => $deleteDuration
    ];
}


for ($i=0; $i < 10; $i++) { 
    // 10 items
    $firstArr = new myArr(range(1, 10));
    
    echo microMetter($firstArr)['delete']."\n";
}

echo "\n";

for ($i=0; $i < 10; $i++) { 
    // 1000 items
    $secondArr = new myArr(range(1, 1000));
    
    echo microMetter($secondArr)['delete']."\n";
}

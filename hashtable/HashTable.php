<?php

require "./linkedList/LinkedList.php";

/**
 * put($key, $value)
 * get($key): value
 * remove($key)
 * 
 * collision => chaining
 * hash function => key%lenght
 * 
 * entry: obj(key: integer, value: any);
 * bucket: LinkedList<entry>
 * hashTable: bucket[]
 */ 
class HashTable
{
    private $length;
    public $items = [];

    public function __construct($length = 10)
    {
        $this->length = $length;
    }

    public function put(int $key, $value)
    {
        $bucket = $this->getOrCreateBucket($key);
        

        foreach($bucket->getAsArray() as $entry) {
            if($entry->key === $key ) {
                $entry->value = $value;
                return;
            }
        }

        $bucket->push($this->makeEntry($key, $value));
        $this->items[$this->hash($key)] = $bucket;
    }

    public function get(int $key)
    {
        if(!$bucket = $this->getBucket($key)) {
            return null;
        }

        foreach($bucket->getAsArray() as $entry) {
            if($entry->key === $key ) {
                return $entry->value;
            }
        }

        return null;
    }

    public function remove(int $key): bool
    {
        if(!$bucket = $this->getBucket($key)) {
            return false;
        }

        $newBucket = new LinkedList;
        $contains = false;

        // It would be better if our linked list has a method linke remove($index) ....
        foreach($bucket->getAsArray() as $entry) {
            if($entry->key !== $key ) {
                $newBucket->push($entry);
            }else {
                $contains = true;
            }
        }

        $this->items[$this->hash($key)] = $newBucket;

        return $contains;
    }

    private function hash(int $key)
    {
        return $key % $this->length;
    }

    private function makeEntry($key, $value)
    {
        $entry = new stdClass;
        $entry->key = $key;
        $entry->value = $value;
        return $entry;
    }

    private function getBucket(int $key)
    {
        return $this->items[$this->hash($key)] ?? false;
    }

    private function getOrCreateBucket(int $key)
    {
        return $this->getBucket($key) ?: new LinkedList;
    }
}
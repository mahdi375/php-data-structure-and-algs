<?php

require "./binaryTrees/BinarySearchNode.php";

class BinarySearch
{
    private ?BinarySearchNode $root = null;

    public function insert(int $value)
    {
        $node = new BinarySearchNode($value);

        if(is_null($this->root)) {
            $this->root = $node;
            return;
        }

        $current = $this->root;

        while($current) {
            if($value > $current->value) {
                if(is_null($current->rightNode)) {
                    $current->rightNode = $node;
                    break;
                }

                $current = $current->rightNode;
            } elseif($value < $current->value) {
                if(is_null($current->leftNode)) {
                    $current->leftNode = $node;
                    break;
                }
                $current = $current->leftNode;
            }else {
                // when $value exists in tree
                break;
            }
        }
    }

    public function find(int $value)
    {
        $current = $this->root;

        while($current) {
            if($value > $current->value) {
                $current = $current->rightNode;
            } elseif($value < $current->value) {
                $current = $current->leftNode;
            }else {
                return true;
            }
        }

        return false;
    }

}

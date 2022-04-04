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

    public function traversePreOrder()
    {
        return $this->traversePreOrderRecursion($this->root);
    }

    private function traversePreOrderRecursion(?BinarySearchNode $root)
    {
        if(is_null($root)) {
            return;
        }

        echo $root->value;
        $this->traversePreOrderRecursion($root->leftNode);
        $this->traversePreOrderRecursion($root->rightNode);
    }

    public function traverseInOrder()
    {
        return $this->traverseInOrderRecursion($this->root);
    }

    private function traverseInOrderRecursion(?BinarySearchNode $root)
    {
        // TODO: what if want to return array of nodes in order
        if(is_null($root)) {
            return;
        }

        $this->traverseInOrderRecursion($root->leftNode);
        echo $root->value;
        $this->traverseInOrderRecursion($root->rightNode);
    }

    public function traversePostOrder()
    {
        return $this->traversePostOrderRecursion($this->root);
    }

    private function traversePostOrderRecursion(?BinarySearchNode $root)
    {
        if(is_null($root)) {
            return;
        }

        $this->traversePostOrderRecursion($root->leftNode);
        $this->traversePostOrderRecursion($root->rightNode);
        echo $root->value;
    }

    public function height()
    {
        return $this->heightRecursion($this->root);
    }

    private function heightRecursion(?BinarySearchNode $root)
    {
        if(is_null($root)) {
            return -1;
        }

        if($root->isLeaf()) {
            return 0;
        }

        return 1 + max([$this->heightRecursion($root->leftNode, $this->heightRecursion($root->rightNode))]);
    }

    public function min()
    {
        return $this->minRecursion($this->root);
    }

    private function minRecursion(?BinarySearchNode $root)
    {
        if(is_null($root)) {
            return;
        }

        if($root->isLeaf()) {
            return $root->value;
        }

        $subTreeNonNullValues = array_filter([
            $root->value,
            $this->minRecursion($root->leftNode),
            $this->minRecursion($root->rightNode)
        ], fn($item) => !is_null($item));

        return min($subTreeNonNullValues);
    }
}

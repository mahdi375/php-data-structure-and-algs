<?php

require "./AVLTrees/AVLNode.php";

class AVL
{
    private ?AVLNode $root = null;

    public function insert(int $value)
    {
        $this->root = $this->insertRecursion($this->root, $value);
    }

    public function getRoot(): ?AVLNode
    {
        return $this->root;
    }

    private function insertRecursion(?AVLNode $root, int $value)
    {
        if (is_null($root)) return new AVLNode($value);
        
        if ($root->itValueIsGreaterThan($value)) {
            $root->left = $this->insertRecursion($root->left, $value);
        } else {
            $root->right = $this->insertRecursion($root->right, $value);
        }

        $root->refreshHeight();

        $this->balance($root);
       
        return $root;
    }

    private function balance($root)
    {
        if($root->isLeftHeavy()) {
            if($root->left->balanceFactore() < 0) {
                echo "{$root->left->value} => LeftRotate & ";
            }
            echo "{$root->value} => RightRotate \n";
        } elseif ($root->isRightHeavy()) {
            if($root->right->balanceFactore() > 0) {
                echo "{$root->right->value} RightRotate & ";
            }
            echo "{$root->value} => LeftRotate \n";
        }
    }
}
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

        if($root->isLeftHeavy()) {
            echo "Left Heavy on {$root->value} \n";
        } elseif ($root->isRightHeavy()) {
            echo "Right Heavy on {$root->value} \n";
        }

        return $root;
    }
}
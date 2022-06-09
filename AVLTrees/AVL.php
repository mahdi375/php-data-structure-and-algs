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

        return $this->balance($root);
    }

    private function balance($root)
    {
        if($root->isLeftHeavy()) {
            if($root->left->balanceFactore() < 0) {
                // $root->left => LeftRotate
                $root->left = $this->rotateLeft($root->left);
            }
            // $root => RightRotate
            $newRoot = $this->rotateRight($root);
        } elseif ($root->isRightHeavy()) {
            if($root->right->balanceFactore() > 0) {
                // $root->right RightRotate
                $root->right = $this->rotateRight($root->right);
            }
            // $root => LeftRotate
            $root = $this->rotateLeft($root);
        }

        return $newRoot ?? $root;
    }

    private function rotateLeft(AVLNode $root): AVLNode
    {
        $child = $root->right;
        $root->right = $child->left;
        $child->left = $root;

        $root->refreshHeight();
        $child->refreshHeight();
        return $child;
    }

    private function rotateRight(AVLNode $root): AVLNode
    {
        $child = $root->left ;
        $root->left = $child->right;
        $child->right = $root;

        $root->refreshHeight();
        $child->refreshHeight();
        return $child;
    }
}
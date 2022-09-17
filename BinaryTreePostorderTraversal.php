<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function postorderTraversal($root) {
        $ra = array();
        $stack = array();
        $lastNodeVisited = null;
        $curr = $root;
        while ( count($stack) != 0 || $curr != null  ) {
            if ( $curr != null ) {
                array_push($stack, $curr);
                $curr = $curr->left;
            } else {
                $peekNode = array_pop($stack);
                if ( $peekNode->right != null and $lastNodeVisited != $peekNode->right ) {
                    $curr = $peekNode->right;
                    $ra[] = $curr->val;
                } else {
                    $ra[] = $peekNode->val;
                    $lastNodeVisited = array_pop($stack);
                }
            }
        }
        return $ra;

    }
}

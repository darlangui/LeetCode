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

        public $diff = PHP_INT_MAX;
        public $last_visited = null;
        /**
         * @param TreeNode $root
         * @return Integer
         */
        function getMinimumDifference($root) {
            if(!$root){
                return;
            }
            $this->getMinimumDifference($root->left);

            if(!is_null($this->last_visited)){
                $tmp = abs($root->val - $this->last_visited);
                if($tmp < $this->diff){
                    $this->diff = $tmp;
                }
            }
            $this->last_visited = $root->val;

            $this->getMinimumDifference($root->right);

            return $this->diff;
        }
    }

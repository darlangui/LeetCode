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


    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth($root) {
        if($root == null) return 0;
        $queue = [$root];
        $count = 1;
        while(count($queue) > 0){
            $len = count($queue);
            for($i = 0;$i < $len;$i++){
                $node = array_shift($queue);
                if($node->left == null && $node->right == null) return $count;
                if($node->left != null) $queue[] = $node->left;
                if($node->right != null) $queue[] = $node->right;
            }
            $count++;
        }
        return $count;
    }

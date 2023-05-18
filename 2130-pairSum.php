<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return Integer
     */
    function pairSum($head) {
        $slow = $head;
        $fast = $head;
        $maxVal = 0;

        # Get middle of linked list
        while ($fast and $fast->next){
            $fast = $fast->next->next;
            $slow = $slow->next;
        }

        # Reverse second part of linked list
        $curr = $slow;
        $prev = [];
        $temp = [];

        while ($curr) {
            $temp = $curr->next;
            $curr->next = $prev;
            $prev = $curr;
            $curr = $temp;
        }

        # Get max sum of pairs
        while ($prev) {
            $maxVal = max($maxVal, $head->val + $prev->val);
            $prev = $prev->next;
            $head = $head->next;
        }
        return $maxVal;
    }
}
?>



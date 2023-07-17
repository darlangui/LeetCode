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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $l1Arr = [];
        $l2Arr = [];

        //from node to array
        while ($l1) {
            $l1Arr[] = $l1->val;
            $l1 = $l1->next;
        }

        //from node to array
        while ($l2) {
            $l2Arr[] = $l2->val;
            $l2 = $l2->next;
        }

        //if summ > 10 we keep 1
        $inMind = 0;
        //current number pointers
        $l1End = count($l1Arr) - 1;
        $l2End = count($l2Arr) - 1;

        $answer = [];

        //$answer is array of summ l1Arr and l2Arr
        while ($inMind != 0 || isset($l1Arr[$l1End]) || isset($l2Arr[$l2End])) {
            //if $l1Arr[$l1End] = 9 and $l2Arr[$l2End] = 9, then in answer we add 8, and keep 1 in mind
            //then decrement ends of arrays
            array_unshift($answer, ($l1Arr[$l1End] + $l2Arr[$l2End] + $inMind) % 10);
            $inMind = intdiv($l1Arr[$l1End] + $l2Arr[$l2End] + $inMind, 10);
            $l1End--;
            $l2End--;
        }


        if(!$answer) return new ListNode;

        //start create new list
        $l3 = new ListNode;
        $head = 0;

        //for every element in answer we create new ListNode with val = current value of answer and ->next is new ListNode if it is not last element
        for ($i=0; $i < count($answer); $i++) {

            $l3->val = $answer[$i];

            if ($i != count($answer) - 1) {
                $l3->next = new ListNode;
            } else {
                $l3->next = null;
            }

            if ($i == 0) $head = $l3;
            $l3 = $l3->next;
        }

        return $head;
    }
}
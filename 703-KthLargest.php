<?php
class KthLargest {
    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    function __construct($k, $nums) {
        $this->k = $k;
        $this->minHeap = new SplMinHeap();

        foreach($nums as $n){
            $this->minHeap->insert($n);
        }
    }

    /**
     * @param Integer $val
     * @return Integer
     */
    function add($val) {
        $this->minHeap->insert($val);
        while($this->minHeap->count() > $this->k){
            $this->minHeap->extract();
        }
        return $this->minHeap->top();
    }
}

/**
 * Your KthLargest object will be instantiated and called as such:
 * $obj = KthLargest($k, $nums);
 * $ret_1 = $obj->add($val);
 */




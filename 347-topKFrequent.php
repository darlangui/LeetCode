<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent($nums, $k) {
        $test =  array_count_values($nums);
        arsort($test);
        $arr = [];
        var_dump($test);
        foreach ($test as $key => $v){
            if($k == 0){
                break;
            }else{
                array_push($arr, intval($key));
                $k--;
            }
        }
        return $arr;
    }
}

$solution = new Solution();
var_dump($solution->topKFrequent([1,1,1,2,2,3], 2));

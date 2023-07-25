<?php
class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function peakIndexInMountainArray($arr) {
        $low = 0;
        $high = count($arr) - 1;
        while ($low <= $high) {
            $mid = floor ($low + ($high - $low)/2);
            if ($arr[$mid]  < $arr[$mid+1]) {
                $low = $mid + 1;
            } else if ($arr[$mid] < $arr[$mid-1]) {
                $high = $mid - 1;
            } else {
                return $mid;
            }
        }
        return $mid;
    }
}
<?php
class Solution {

    /**
     * @param Integer[] $dist
     * @param Float $hour
     * @return Integer
     */
    function minSpeedOnTime($dist, $hour) {
        $len = count($dist);
        if ($len - 1 >= $hour) {
            return -1;
        }
        $checkValid = function($speed, $hour, $dist) {
            $total = 0;
            $len = count($dist);
            foreach ($dist as $key => $item) {
                if ($key < $len - 1) {
                    $total += ceil($item / $speed);
                } else {
                    $total += $item/$speed;
                }

            }
            if ($total <= $hour) return true;
        };
        $sum = array_sum($dist);
        $avg = floor($sum / $hour) == 0 ? 1 : floor($sum / $hour);
        $max = 0;
        foreach ($dist as $item) {
            $max = max($max, $item);
        }

        $left = $avg;
        $right =  max(ceil($dist[$len - 1] / (($hour - floor($hour)) == 0 ? 1 : ($hour - floor($hour)))), $max);
        while ($left < $right) {
            $mid = floor(($left + $right) / 2);
            if (!$checkValid($mid, $hour, $dist)) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }
        return $right;
    }
}
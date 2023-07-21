<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findNumberOfLIS($nums) {
        $n = count($nums);
        if ($n == 0) return 0;

        $dp = array_fill(0, $n, 1);
        $count = array_fill(0, $n, 1);

        $maxLength = 1;

        for ($i = 1; $i < $n; $i++) {
            for ($j = 0; $j < $i; $j++) {
                if ($nums[$i] > $nums[$j]) {
                    if ($dp[$j] + 1 > $dp[$i]) {
                        $dp[$i] = $dp[$j] + 1;
                        $count[$i] = $count[$j];
                    } else if ($dp[$j] + 1 == $dp[$i]) {
                        $count[$i] += $count[$j];
                    }
                }
            }
            $maxLength = max($maxLength, $dp[$i]);
        }

        $result = 0;
        for ($i = 0; $i < $n; $i++) {
            if ($dp[$i] == $maxLength) {
                $result += $count[$i];
            }
        }

        return $result;
    }
}
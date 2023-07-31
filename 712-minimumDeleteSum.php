<?php
class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Integer
     */
    function minimumDeleteSum($s1, $s2) {
        $n = strlen($s1);
        $m = strlen($s2);
        $a = array_fill(-1, $n+1, array_fill(-1, $m+1, 0));
        for($i=0; $i < $n; $i++) {
            $a[$i][-1] = $a[$i-1][-1] + ord($s1[$i]);
        }
        for($j=0; $j < $m; $j++) {
            $a[-1][$j] = $a[-1][$j-1] + ord($s2[$j]);
        }

        for($i=0; $i < $n; $i++) {
            for($j=0; $j < $m; $j++) {
                $a[$i][$j] = $a[$i-1][$j-1] + ord($s1[$i]) + ord($s2[$j]);
                if($s1[$i] === $s2[$j]){
                    $a[$i][$j] = $a[$i-1][$j-1];
                }
                $a[$i][$j] = min($a[$i][$j], $a[$i-1][$j] + ord($s1[$i]), $a[$i][$j-1] + ord($s2[$j]));
            }
        }



        return $a[$n-1][$m-1];
    }
}
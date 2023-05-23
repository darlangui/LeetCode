<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     *
    I             1
    V             5
    X             10
    L             50
    C             100
    D             500
    M             1000
     */
    function romanToInt($s) {    $arr = str_split($s);
        $sum = 0;
        $chars = [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100,
            'D' => 500,
            'M' => 1000,
        ];
        foreach($arr as $arrKey => $arrItem) {
            $sign = 1;
            if(isset($arr[$arrKey+1])) {
                $nextVal = $chars[$arr[$arrKey+1]];
                if($nextVal > $chars[$arrItem]){
                    $sign = -1;
                }
            }
            $sum += $sign * $chars[$arrItem];
        }
        return $sum;

    }
}

$test = new Solution();
echo $test->romanToInt('XII');
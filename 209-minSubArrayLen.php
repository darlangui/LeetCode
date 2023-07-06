<?php

/**
 * @param Integer $target
 * @param Integer[] $nums
 * @return Integer
 */
function minSubArrayLen($target, $nums) {

    $count  = count( $nums );
    $result = PHP_INT_MAX;
    $sum    = 0;
    $left   = 0;

    for ( $r = $left; $r < $count; $r++ )
    {
        $sum += $nums[$r];
        while ( $sum >= $target )
        {
            $result = min( $r - $left + 1, $result );
            $sum    -= $nums[$left];
            $left++;
        }
    }

    return $result == PHP_INT_MAX ? 0 : $result;
}

echo minSubArrayLen(7, [2,3,1,2,4,3]);
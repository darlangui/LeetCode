<?php



 /**
 * @param Integer[] $nums
 * @return Integer
 */
 function singleNumber($nums) {
     return array_search(1, array_count_values($nums));
 }
 echo singleNumber([0,1,0,1,0,1,99,99,5]);

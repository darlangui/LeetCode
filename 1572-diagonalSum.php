<?php
/**
 *
Given a square matrix mat, return the sum of the matrix diagonals.

Only include the sum of all the elements on the primary diagonal and all the elements on the secondary diagonal
that are not part of the primary diagonal.
 */

/**
 * @param Integer[][] $matrix
 * @return array
 */
function diagonalSum($matrix) {
    $rows =  count($matrix);
    $cols = count($matrix[0]);

    $top = 0;
    $left = 0;
    $right = $cols -1;
    $bottom = $rows -1;

    $output = [];

    while(count($output) < $rows * $cols) {

        for($col = $left;$col <= $right;$col++) {
            $output[] = $matrix[$top][$col];
        }
        for($row = $top +1;$row <= $bottom;$row++) {
            $output[] = $matrix[$row][$right];
        }
        if($top != $bottom) {
            for($col = $right -1;$col >= $left;$col--) {
                $output[] = $matrix[$bottom][$col];
            }
        }
        if($left != $right) {
            for($row = $bottom -1;$row > $top;$row--) {
                $output[] = $matrix[$row][$left];
            }
        }
        $left++;
        $right--;
        $top++;
        $bottom--;
    }
    return($output);
}

$mat = [[1,2,3],
    [4,5,6],
    [7,8,9]];

var_dump(diagonalSum($mat));
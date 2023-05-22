<?php
class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findSmallestSetOfVertices($n, $edges) {
        $notReached = range(0, $n-1);
        $edgesCount = count($edges);

        for($i = 0; $i < $edgesCount; $i++) {
            if (isset($notReached[$edges[$i][1]])) {
                unset($notReached[$edges[$i][1]]);
            }
        }

        return array_keys($notReached);
    }
}
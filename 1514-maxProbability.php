<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param Float[] $succProb
     * @param Integer $start
     * @param Integer $end
     * @return Float
     */
    function maxProbability($n, $edges, $succProb, $start, $end) {
        $adjs = [];

        foreach($edges as $i=>$e){
            $adjs[$e[0]][] = [$e[1], $succProb[$i]];
            $adjs[$e[1]][] = [$e[0], $succProb[$i]];
        }

        $visited = [];
        $heap = new SplMaxHeap();
        $heap->insert([1, $start]);
        $max = 0;

        while(!$heap->isEmpty()){
            list($succ, $node) = $heap->extract();

            if(in_array($node, $visited)){
                continue;
            }

            if($node === $end){
                $max = max($max, $succ);
                continue;
            }

            $visited[] = $node;

            foreach($adjs[$node] as $neighbour){
                list($n_node, $n_succ) = $neighbour;

                if(in_array($n_node, $visited)){
                    continue;
                }

                $heap->insert([$n_succ*$succ, $n_node]);
            }
        }

        return $max;
    }
}
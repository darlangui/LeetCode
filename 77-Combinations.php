<?php

class Solution
{

    /**
     * @param Integer $n
     * @param Integer $k
     *
     * @return Integer[][]
     */
    function combine($n, $k)
    {

        if ($k === 1) {
            return array_map(function($i) { return [$i]; }, range(1, $n));
        }

        return iterator_to_array($this->comb($n, $k, 0, 1), false);
    }

    function comb($n, $k, $pos, $min, &$variant = [])
    {
        if($pos === $k) {
            yield $variant;
            return;
        }

        for ($i = $min; $i <= $n - ($k - $pos) + 1; $i++) {
            $variant[$pos] = $i;
            yield from $this->comb($n, $k, $pos + 1, $i + 1, $variant, $res);
        }
    }

}
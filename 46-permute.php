<?php
class Solution
{

    /**
     * @param Integer[] $nums
     *
     * @return Integer[][]
     */
    function permute($nums)
    {
        return iterator_to_array($this->comb($nums), false);
    }

    function comb(&$nums, $start = 0)
    {
        $count = count($nums);
        if ($start === $count - 1) {
            yield $nums;
            return;
        }
        yield from $this->comb($nums, $start + 1);
        for ($i = $start + 1; $i < $count; $i++) {
            [$nums[$i], $nums[$start]] = [$nums[$start], $nums[$i]];
            yield from $this->comb($nums, $start + 1);
            [$nums[$i], $nums[$start]] = [$nums[$start], $nums[$i]];
        }
    }
}
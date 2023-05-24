<?php
class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        $result = $strs[0];
        for ($i = 1; $i < count($strs); $i++) {
            $str = $strs[$i];
            while (substr($str, 0, strlen($result)) != $result && strlen($result) > 0)
                $result = substr($result, 0, strlen($result) - 1);
        }
        return $result;
    }
}

$test = new Solution();
echo $test->longestCommonPrefix(["flower","flow","flight"]);
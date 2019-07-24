<?php

/**
 *
 */
class Solution
{

    /**
     * leecode第一题: 两数之和
     * @param  array $nums
     * @param  int $target
     * @return array 符合条件的nums的下标
     *
     *
     * [3, 5, 6]    11
     *
     */
    public function twoSum($nums, $target)
    {
        $keys = []; //存放下标

        $total = count($nums);
        for ($i = 0; $i < $total; ++$i) {
            $diff = $target - $nums[$i];
            if (isset($keys[$diff])) {
                return [$keys[$diff], $i];
            }
            $keys[$nums[$i]] = $i;
        }
        return [0, 0];
    }

}

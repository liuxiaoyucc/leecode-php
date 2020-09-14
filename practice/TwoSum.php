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
     * return [1, 2]
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

    /**
     * 两数之和, 暴力解法, 不推荐
     */
    public function two_sum($array, $target)
    {
        $length = count($array);
        for ($i = 0; $i < $length; $i++) { 
            $second = $target - $array[$i];

            for ($j = 0; $j < $length; $j++) { 

                if ($second == $array[$j] && $i != $j) {
                    return [$i, $j];
                }
            }
        }
        return [0, 0];
    }

    // 直接交换数组k v
    public function two_sum_flip($array, $target)
    {
        $num = array_flip($array);
        foreach ($array as $key => $value) {
            $diff = $target - $value;
            if (isset($num[$diff]) && $num[$diff] != $key) {
                return [$key, $num[$diff]];
            }
        }
        return [0, 0];
    }

}

$solution = new Solution;

$res = $solution->two_sum_flip([1, 1, 8], 9);
print_r($res);

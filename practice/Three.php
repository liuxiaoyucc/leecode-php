<?php

/**
 * 无重复最长子串
 */
class Three
{
    /**
     * 第一次解法
     */
    public function lengthOfLongestSubstring($str)
    {
        $length = strlen($str);
        $res = []; // 存放过程字符串
        $max = 0; // 记录最大的长度
        $tmp_max = 0; // 每次循环时的临时长度
        $amount_sublen = 0; // 左侧共移除了多少个元素

        for ($i = 0; $i < $length; $i++) { 
            if (!isset($res['bigbear_'.$str[$i]])) {
                $res['bigbear_'.$str[$i]] = $i;
                $tmp_max ++;
            }else {
                $sublen = $res['bigbear_'.$str[$i]] + 1 - $amount_sublen;
                $amount_sublen += $sublen;

                $res = array_slice($res, $sublen);
                $tmp_max -= $sublen;
                $tmp_max ++;
                $res['bigbear_'.$str[$i]] = $i;

            }
            $max = $tmp_max > $max ? $tmp_max : $max;
        }
        return $max;
    }

    // 优化
    public function lengthOfLongestSubstring2($str)
    {
        $length = strlen($str);
        if ($length) {
            $res = [];
            $nums = []; // 保存经历过的长度
            $tmp_max = 0; // 当前长度
            $cur_index = 0; // 指针位置. 每一段未重复字符串的开头位置

            for ($i = 0; $i < $length; $i++) {
                
                if (!isset($res[$str[$i]])) {
                    $res[$str[$i]] = $i;
                    $tmp_max ++;
                }else {
                    if ($cur_index < $res[$str[$i]]) {
                        $cur_index = $res[$str[$i]];
                    }
                    $nums[] = $tmp_max;

                    $tmp_max = $i - $cur_index;
                    $res[$str[$i]] = $i;
                }

            }
            $nums[]=$tmp_max;
            return max($nums);
        }
        return 0;
        
    }
}

$three = new Three;

$str = " ";
$res = $three->lengthOfLongestSubstring2($str);
print_r($res);

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
        $res = [];
        $max = 0;
        $tmp_max = 0;
        $amount_sublen = 0;

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
}

$three = new Three;

$str = "abc123abc123abc123";
$res = $three->lengthOfLongestSubstring($str);
print_r($res);

<?php

namespace Learn;

/**
 * 两数之和 (暴力解法)
 */
class TwoSum
{
    public function twoSum($nums, $target)
    {
        $outArr = [];
        foreach ($nums as $key => $num) {
            $num1 = $target - $num;
            foreach ($nums as $k => $n) {
                if ($k != $key) {
                    if ($num1 == $n) {
                        $outArr = [
                            $key,
                            $k,
                        ];
                        if (!empty($outArr)) {
                            return $outArr;
                        }
                    }
                }

            }
        }
        return $outArr;
    }
}

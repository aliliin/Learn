<?php

/**
 * 找到数组中最小的数字
 */
$arr = [23, 24, 5, 6];
$arr = [2, 24, 5, 6];
function findSmallestNum($arr)
{
    // 直接获取最小值
    return min($arr);
    // 通过排序再取出最小值。
    sort($arr);
    return $arr[0];
    //  直接获取最大值
    return max($arr);
}

echo findSmallestNum($arr);

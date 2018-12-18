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

/**
 * 给定一个数字来确定是偶数还是整数
 */
$num = 23;
function isEvenOrOdd($num)
{
    return $num % 2 ? "even" : "odd";

}
echo isEvenOrOdd($arr);

/**
 *  给定一个数字 算出累计值
 */
$num = 23;
function addUp($num)
{
    return ($num * ($num + 1)) / 2;
}
echo addUp($num);

$numbers   = 132;
$numberArr = [1, 3, 2, 4, 9, 5, 6, 7, 8];
function formatPhoneNumber($numbers, $numberArr)
{
    // 取出最后一位
    $endStr  = substr($numbers, -1, 1);
    $number  = stripos($endStr, $numberArr);
    $number  = substr($number, 0, 2);
    $number1 = substr($number, 2);
    $str     = $number . '-' . $number1;

}
echo formatPhoneNumber($numbers, $numberArr);

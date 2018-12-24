<?php
// 总结几个 回调函数的用法
//
//取一个整数数组（正数或负数或两者）并返回每个元素的绝对值之和。
//getAbsSum([2, -1, 4, 8, 10]) ➞ 25
// getAbsSum([-3, -4, -10, -2, -3]) ➞ 22

$arr = [-3, -4, -10, -2, -3];
//  先通过array_map函数调用 绝对值的函数 然后通过数组求和的方式获取绝对值的和。
echo array_sum(array_map('abs', $arr));
//创建一个获取数字数组并仅返回偶数值的函数。
//[1, 2, 3, 4, 5, 6, 7, 8] ➞ [2, 4, 6, 8];

$arr = [1, 2, 3, 4, 5, 6, 7, 8];
return array_filter($arr, function ($key) {
    return $key % 2 === 0;
});

// 创建一个函数，该函数接受一组名称并返回一个首字母大写的数组。
$arr = ['mARIANN', 'jOI', 'gEORGEANN'];
// array array_map ( callable $callback , array $array1 [, array $... ] )
// array_map 为数组的每个元素应用回调函数
array_map('ucfirst', array_map('strtolower', $arr));

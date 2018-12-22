<?php
// 总结几个 回调函数的用法
//

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

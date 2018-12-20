<?php

// CumulativeArraySum
// 累计数组的总和
//   创建一个函数，该函数接受一个数字数组并返回一个数组，其中每个数字是其自身的总和+数组中的所有先前数字。

$arr    = [3, 3, -2, 408, 3, 3];
$newArr = [];
$sum    = 0;
foreach ($array as $n) {
    $sum += $n;
    $newArr[] = $sum;
}
return $newArr;

<?php

// 创建一个函数，该函数采用1到10之间的数字数组（不包括一个数字）并返回缺少的数字。
//
$countNumber = 55;
$arr         = [1, 2, 3, 4, 6, 7, 8, 9, 10];
echo $countNumber - array_sum($arr);

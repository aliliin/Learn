<?php
require 'vendor/autoload.php';
use \Learn\Child;
use \Learn\TwoSum;
echo '<pre/>';
// 整数反转

// 两数之和
$nums = [2, 7, 11, 15];
// $nums = [3, 2, 4];
// $nums   = [2, 5, 5, 11];
$target = 9;
$twosum = new TwoSum();
$res    = $twosum->twosum($nums, $target);
var_dump($res);
// 自动加载测试
die;
$child = new Child();
echo $child->getEyesCount();
echo Child::getLegCount();

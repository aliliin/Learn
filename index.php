<?php
require 'vendor/autoload.php';
use Learn\DependencyInjection\DatabaseConfiguration;
use Learn\DependencyInjection\DatabaseConnection;
use \Learn\Child;
use \Learn\TwoSum;
echo '<pre/>';

$config = new DatabaseConfiguration('localhost', 3306, 'root', '');
var_dump($config);

$data = new DatabaseConnection($config);

var_dump($data->getDsn());
die;
$string = 'Daily Function Learning';
$str    = 'F';
echo strstr($string, $str); // Function Learning
die;

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

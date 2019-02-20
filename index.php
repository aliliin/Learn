<?php
require 'vendor/autoload.php';
use Learn\DependencyInjection\DatabaseConfiguration;
use Learn\DependencyInjection\DatabaseConnection;
use \Learn\Child;
use \Learn\Observer\User;
use \Learn\Observer\UserObserver;
use \Learn\TwoSum;
use \Learn\TraitLearn\MiPhone;
use \Learn\TraitLearn\SamsangPhone;
echo '<pre/>';
$mi = new MiPhone('miui');
$san = new SamsangPhone();
print_r($san);
die;


die;
$observer = new UserObserver();
$user     = new User();
$user->attach($observer);
$user->changeEmail('PHPerali@gmail.com');
var_dump($observer->getChangedUsers());
die;
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

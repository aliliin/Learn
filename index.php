<?php
require 'vendor/autoload.php';
use \Learn\Child;
use \Learn\Singleton\SingletonTest;

$SingletonTest = new SingletonTest();
var_dump($SingletonTest->testUniqueness());

// 自动加载测试
die;
$child = new Child();
echo $child->getEyesCount();
echo Child::getLegCount();

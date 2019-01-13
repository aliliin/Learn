<?php
require 'vendor/autoload.php';
use \Learn\Child;

// 自动加载测试
die;
$child = new Child();
echo $child->getEyesCount();
echo Child::getLegCount();

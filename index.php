<?php
echo '<pre/>';

// 创建一个函数，该函数接受一组名称并返回一个首字母大写的数组。
$arr    = ['mARIANN', 'jOI', 'gEORGEANN'];
$newArr = [];
array_map('ucfirst', array_map('strtolower', $arr));
foreach ($arr as $str) {

    $str      = strtolower($str);
    $newArr[] = ucwords($str);
}
var_dump($newArr);die;
// 创建一个函数，该函数采用1到10之间的数字数组（不包括一个数字）并返回缺少的数字。
/*
[1, 2, 3, 4, 6, 7, 8, 9, 10] ➞ 5
 */
$arr = [7, 2, 3, 6, 5, 9, 1, 4, 8];

echo 55 - array_sum($arr);
die;
//   创建一个函数，该函数接受一个数字数组并返回一个数组，其中每个数字是其自身的总和+数组中的所有先前数字。
$arr = [3, 3, -2, 408, 3, 3];
// [3, 3, -2, 408, 3, 3] ➞ [3, 6, 4, 412, 415, 418]

$newArr = array();
$sum    = 0;
foreach ($array as $n) {
    $sum += $n;
    $newArr[] = $sum;
}
return $newArr;

// 创建一个带有数字数组的函数，并将平均值作为字符串返回。
$arr = [1, 0, 4, 5, 2, 4, 1, 2, 3, 3, 3];
echo round(array_sum($arr) / count($arr), 2);
die;
$arr = str_split("testing");
$num = count($arr);
if ($num % 2 === 0) {
    $num = $num / 2;
    echo substr('testing', $num - 1, 2);
} else {
    $num = ceil($num / 2);
    echo substr('testing', $num - 1, 1);
}

// var_dump(str_split(highLow("4 5 29 54 4 0 -214 542 -64 1 -3 6 -6")));

die;
// 创建一个接受字符串并返回一个字符串的函数，其中每个字符重复一次。
$variable = str_split("Shanghai");

$str = '';
foreach ($variable as $key => $value) {
    $str .= $value . $value;
}
echo $str;die;
die;

$arr = ["a", 1, "i", "o", "u"];
var_dump(array_filter($arr, 'is_integer'));
die;
if (isset($arr1)) {
    return $arr1;
} else {
    return [];
}

die;
function formatPhoneNumber($numbers)
{
    return vsprintf('(%d%d%d) %d%d%d-%d%d%d%d', $numbers);
}
echo formatPhoneNumber($numbers);
die;
//接口interface 的学习 与 理解
interface Logger
{
    public function save($message);
}
class FileLogger implements Logger
{
    public function save($message)
    {
        var_dump('log into file ' . $message);
    }
}
class DatabaseLogger implements Logger
{
    public function save($message)
    {
        var_dump('log into database ' . $message);
    }
}
class UserController
{
    protected $logger;
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function register()
    {
        $user = 'gao ';
        $this->logger->save($user);
    }
}
$controller = new UserController(new FileLogger());
$controller->register();

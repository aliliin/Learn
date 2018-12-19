<?php
echo '<pre/>';

// public function test()
// {
//   $this->assertEquals("es", getMiddle("test"));
//   $this->assertEquals("t", getMiddle("testing"));
//   $this->assertEquals("dd", getMiddle("middle"));
//   $this->assertEquals("A", getMiddle("A"));
//   $this->assertEquals("bi", getMiddle("inhabitant"));
//   $this->assertEquals("o", getMiddle("brown"));
//   $this->assertEquals("aw", getMiddle("pawn"));
//   $this->assertEquals("i", getMiddle("cabinet"));
//   $this->assertEquals("e", getMiddle("fresh"));
//   $this->assertEquals("or", getMiddle("shorts"));
// }

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

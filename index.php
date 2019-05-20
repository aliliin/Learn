<?php
require 'vendor/autoload.php';
use Learn\DependencyInjection\DatabaseConfiguration;
use Learn\DependencyInjection\DatabaseConnection;
use \Learn\Child;
use \Learn\Observer\User;
use \Learn\Observer\UserObserver;
use \Learn\SimpleFactory\SimpleFactory;
use \Learn\TestClosure;
use \Learn\TraitLearn\MiPhone;
use \Learn\TraitLearn\SamsangPhone;
use \Learn\TwoSum;

echo '<pre/>';
class Courier implements Countable
{
    protected $count = 0;
    public function ship(Parcel $parcel)
    {
        $this->count++;
        return true;
    }
    public function count()
    {
        return $this->count;
    }
}
$courier =new Courier()
var_dump($courier);
die;

$channels = include './channels.php';
$game     = include './game_server.php';
$pay      = include './Pay_All.php';
$cun      = include './cunliang_20190505.php';

$server = array();
foreach ($game as $id) {
    $server[$id['area_id']] = $id['sname'];
}
$channelArr = array();
foreach ($channels as $channel) {
    $channelArr[$channel['pid']] = $channel['channel_name'];
}
$cunArr = array();
foreach ($cun as $c) {
    $cunArr[$c['RoleId']] = $c['RoleName'];
}
$newArr = array();
$a      = '';
$i      = 1;
foreach ($pay as $key => $value) {
    ;
    $newArr[$key]['GameSvrId']    = empty($server[$value['GameSvrId']]) ? $value['GameSvrId'] : $server[$value['GameSvrId']];
    $newArr[$key]['LoginChannel'] = empty($channelArr[$value['LoginChannel']]) ? $value['LoginChannel'] : $channelArr[$value['LoginChannel']];
    $newArr[$key]['Roleid']       = empty($cunArr[$value['Roleid']]) ? $value['Roleid'] : $cunArr[$value['Roleid']];
    $newArr[$key]['rmb']          = $value['rmb'];
    $newArr[$key]['vopenid']      = $value['vopenid'];
    $a .= $value['Roleid'] . ',';
    $i++;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<div >
<table border="1" bordercolor="#000000" cellspacing="0" cellpadding="2" style="border-collapse:collapse;">
<tr>
    <td>服务器名称</td>
    <td>渠道名称</td>
    <td>角色名称</td>
    <td>充值金额</td>
</tr>
<?php foreach ($newArr as $key => $value) {
    echo '<tr>';
    echo '<td>' . $value['GameSvrId'] . '</td>';
    echo '<td>' . $value['LoginChannel'] . '</td>';
    echo '<td>' . $value['Roleid'] . '</td>';
    echo '<td>' . $value['rmb'] . '</td>';

}
echo '</tr>';
?>

</table>
    </div>
</body>
<style>
  body {
    margin: 0;
  }
</style>
</html>
<?php

die;
print_r($newArr);
die;

var_dump($channels);
die;
die;

// ini_set('memory_limit', '16384M');
// $array = array_map('str_getcsv', file('./MoneyFlow2.csv'));

// 共同接口
interface db
{
    public function conn();
}
// 服务端开发（不知道会被谁调用）
class dbMysql
{
    public function conn()
    {
        echo 'suessce';
    }
}

class dbsqlite
{
    public function conn()
    {
        echo 'suessce';
    }
}
die;
// ini_set('memory_limit', '16384M');
// $array = array_map('str_getcsv', file('./MoneyFlow2.csv'));
print_r($array);
$person = new TestClosure();
$person->addPerson("Aliliin", function () {
    $this->age = 28;
    $this->sex = "man";
});

$person->display("Aliliin");
die;
$closure = function ($name) {
    echo sprintf("Hello %s", $name);
};
echo $closure("Aliliin");
// 检查是不是闭包函数
var_dump($closure instanceof Closure);
function Car($name)
{
    return function ($statu) use ($name) {
        return sprintf("Car %s is %s", $name, $statu);
    };
};
$car = Car("aa");
echo $car('run ');

$factory = new SimpleFactory();
$bicycle = $factory->createBicycle();
$bicycle->driveTo('Paris');

die;
class KthLargest
{
    private $numArr = [];
    private $k;
    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    public function __construct($k, $nums)
    {
        $this->k = $k;
        $num     = count($nums);
        if ($num > $this->k) {
            sort($nums);
            foreach ($nums as $key => $num) {
                if ($this->k > $num) {
                    unset($num);
                } else {
                    $this->numArr[] = $num;
                }
            }
            for ($i = $num; $i < $this->k; $i--) {
                unset($nums[$i]);
            }

            $this->numArr = $nums;
        } else {
            $this->numArr = $nums;
        }
        sort($this->numArr);

    }

    /**
     * @param Integer $val
     * @return Integer
     */
    public function add($val)
    {
        if (count($this->numArr) >= $this->k) {
            if ($val < $this->numArr[0]) {
                return $this->numArr[0];
            } else {
                unset($this->numArr[0]);
                array_push($this->numArr, $val);
                sort($this->numArr);
                return $this->numArr[0];
            }
        } else {
            array_push($this->numArr, $val);
            sort($this->numArr);
            return $this->numArr[0];
        }
    }
}
// $k    = 3;
// $nums = [4, 5, 8, 2];
// [3],[2],[3],[1],[2],[4],[5],[5],[6],[7],[7],[8],[2],[3],[1],[1],[1],[10],[11],[5],[6],[2],[4],[7],[8],[5],[6]]
// [null,-2,0,2,2,4]
$k     = 7;
$nums  = [-10, 1, 3, 1, 4, 10, 3, 9, 4, 5, 1];
$obj   = new KthLargest($k, $nums);
$val   = -1;
$ret_1 = $obj->add($val);
var_dump($ret_1);
/**
 * kthLargest.add(3);   // returns 4
kthLargest.add(5);   // returns 5
kthLargest.add(10);  // returns 5
kthLargest.add(9);   // returns 8
kthLargest.add(4);   // returns 8
 * 您的kthlargest对象将被实例化并按如下方式调用：
 * $obj = KthLargest($k, $nums);
 * $ret_1 = $obj->add($val);
 */
die;
// ["MyQueue","push","push","peek","pop","empty"]
// [[],[1],[2],[],[],[]]
// [null,null,null,1,1,false]
/**
 * Your MyQueue object will be instantiated and called as such:
 * $obj = MyQueue();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->peek();
 * $ret_4 = $obj->empty();
 */

$nums   = [4, 2, 1];
$number = count($nums);
$i      = 1;
$true   = 'true';
foreach ($nums as $num) {
    if ($i < $number) {
        if ($num > $nums[$i]) {
            $true = 'false';
        } else {
            $true = 'true';
        }
    }
    $i++;
}

echo $true;
die;
$mi  = new MiPhone('miui');
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

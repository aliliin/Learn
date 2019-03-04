<?php
require 'vendor/autoload.php';
use Learn\DependencyInjection\DatabaseConfiguration;
use Learn\DependencyInjection\DatabaseConnection;
use \Learn\Child;
use \Learn\Observer\User;
use \Learn\Observer\UserObserver;
use \Learn\TraitLearn\MiPhone;
use \Learn\TraitLearn\SamsangPhone;
use \Learn\TwoSum;

echo '<pre/>';
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

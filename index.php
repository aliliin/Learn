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
abstract class Shape
{
    protected $width  = 0;
    protected $height = 0;
    abstract public function getArea(): int;
    public function render(int $area): void
    {
        //...
    }
}
class Rectangle extends Shape
{
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function getArea(): int
    {
        return $this->width * $this->height;
    }
}
class Square extends Shape
{
    private $length = 0;

    public function setLength(int $length): void
    {
        $this->length = $length;
    }

    public function getArea(): int
    {
        return pow($this->length, 2);
    }
}

function renderLargeRectangles(array $rectangles): void
{
    foreach ($rectangles as $rectangle) {
        if ($rectangle instanceof Square) {
            $rectangle->setLength(5);
        } elseif ($rectangle instanceof Rectangle) {
            $rectangle->setWidth(4);
            $rectangle->setHeight(5);
        }

        $area = $rectangle->getArea();
        $rectangle->render($area);
    }
}

$shapes = [new Rectangle(), new Rectangle(), new Square()];
renderLargeRectangles($shapes);
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

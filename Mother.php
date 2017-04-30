<?php

/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/4/30
 * Time: 上午11:54
 */
class Mother
{
    protected function getEyesCount()
    {
        return "人有两只眼睛";
    }
}

class Child extends Mother
{
    public function getEyes()
    {
        return $this->getEyesCount();
    }

    //子类 重写 父类的方法
    public function getEyesCount()
    {
        return 3;
    }

}

class Boy extends Mother
{

}

$child = new Child();
echo $child->getEyes();
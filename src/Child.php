<?php

namespace Learn;

class Child extends Mother
{
    public function getEyes()
    {
        return $this->getEyesCount();
    }

    //子类 重写 父类的方法
    public function getEyesCount()
    {
        return "人有两只眼睛";
    }

    public static function getLegCount()
    {
        return "人有两条腿";
    }
}

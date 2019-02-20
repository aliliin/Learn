<?php

namespace Learn\TraitLearn;

class SamsangPhone
{
    use Faceable;

    // 三星手机的功能
    protected $bixby;

    public function __construct()
    {
        $this->sayHello();
    }

    /**
     * 本类的私有方法
     * @Author   GaoYongLi
     * @DateTime 2019-02-20
     * @version  [version]
     * @return   [type]     [description]
     */
    private function sayHello()
    {
        echo 'Hi I am Bixby by SamsangPhone';
    }
}

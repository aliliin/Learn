<?php

namespace Learn;

/**
 *  测试 interface 的学习的接口
 */
class TestInterfaceLog
{
    public $log;
    public function __construct(Logger $log)
    {
        $this->log = $log;
    }

    public function register($userInfo)
    {
        return $this->log->save($userInfo);
    }
}
echo '<pre/>';
$TestInterfaceLog = new TestInterfaceLog(new FileLogger());
echo $TestInterfaceLog->register('gaoyongli');

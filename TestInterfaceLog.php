<?php

require_once __DIR__ . "/interfaceLogger.php";
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

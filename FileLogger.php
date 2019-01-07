<?php
require_once __DIR__ . "/interfaceLogger.php";

class FileLogger implements Logger
{
    // 重写 save 方法
    public function save($message)
    {
        var_dump('log into file ' . $message);
    }
}

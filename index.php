<?php
//接口interface 的学习 与 理解
interface Logger{
    public function save($message);
}
class FileLogger implements Logger {
    public function save($message)
    {
        var_dump('log into file ' .$message);
    }
}
class DatabaseLogger implements Logger {
    public function save($message)
    {
        var_dump('log into database ' .$message);
    }
}
class UserController{
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
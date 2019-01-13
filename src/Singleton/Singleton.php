<?php

namespace Learn\Singleton;

final class Singleton
{
    /**
     * @var Singleton
     */
    private static $instance;
    private $host;
    private $database;
    private $user;
    private $pass;

    /**
     * 不允许从外部调用以防止创建多个实例
     * 要使用单例，必须通过 Singleton::getInstance() 方法获取实例
     */
    private function __construct()
    {
        $dns = $this->getDns();
        return new \PDO($dns, $this->user, $this->pass);
    }

    /**
     * 获取链接数据的方法
     * @Author:   GaoYongLi
     * @DateTime: 2019-01-13
     * @return    [string]     [description]
     */
    private function getDns()
    {
        $this->engine   = 'mysql';
        $this->host     = '127.0.0.1';
        $this->database = 'test';
        $this->user     = 'root';
        $this->pass     = '';
        return $this->engine . ':dbname=' . $this->database . ";host=" . $this->host;
    }
    /**
     * 通过懒加载获得实例（在第一次使用的时候创建）
     */
    public static function getInstance(): Singleton
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * 防止实例被克隆（这会创建实例的副本）
     */
    private function __clone()
    {
    }

    /**
     * 防止反序列化（这将创建它的副本）
     */
    private function __wakeup()
    {
    }
}

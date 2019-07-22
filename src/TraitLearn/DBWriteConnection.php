<?php


class DBWriteConnection extends PDO
{
    // 引入 trait 的类
    use \Learn\TraitLearn\Singleton;

    private function __construct()
    {

        parent::__construct('mysql:host=mysql;dbname=mysql', 'root', 'root');
    }
}
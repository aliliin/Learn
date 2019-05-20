<?php
// 多态的基本使用
abstract class Tiger
{
    abstract public function climb();
}
class XTiger extends Tiger
{
    public function climb()
    {
        echo 'not climb';
    }
}
class MTiger extends Tiger
{
    public function climb()
    {
        echo 'climb up';
    }
}

class Client
{
    public static function call(Tiger $animal)
    {
        $animal->climb();
    }
}
Client::call(new XTiger());

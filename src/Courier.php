<?php

namespace Learn;

class Courier
{
    public $name;
    public $home_country;
    private static $instance;

    public function __construct()
    {
        $db   = new \PDO('mysql:host=mysql;dbname=yaf1', 'root', 'root');
        $stmt = $db->query('select * from art');
        var_dump($stmt->fetch());die;
    }
    protected function getLogFile()
    {
        return fopen('/error_log.txt', 'a');
    }
    public function log($message)
    {
        if ($this->logfile) {
            fputs($this->logfile, 'Log message:' . $message . "\n");
        }
    }
    public function __sleep()
    {
        return array("name", "home_country");
    }
    public function __wakeup()
    {
        $this->logfile = $this->getLogFile();
        return true;
    }
    public function ship($parcel)
    {
        return true;
    }
    // 对象返回字符串
    public function __toString()
    {
        return $this->name . '(' . $this->home_country . ')';
    }
    public function __call($name, $params)
    {
        if ($name == 'sendParcel') {
            return $this->send($params[0]);
        } else {
            error_log('Failed call to ' . $name, 'in Courier class');
            return false;
        }
    }
}

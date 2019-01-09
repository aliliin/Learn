<?php

/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/4/30
 * Time: 上午11:45
 */
class LightSwitch
{
    public function on()
    {
        $this->connect();
    }

    public function off()
    {

    }

    private function connect()
    {
        echo "connect";
    }
}

$light = new LightSwitch();
$light->on();

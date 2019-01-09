<?php

namespace Learn\Singleton;

use Learn\Singleton\Singleton;

class SingletonTest
{
    public function testUniqueness()
    {
        $firstCall  = Singleton::getInstance();
        $secondCall = Singleton::getInstance();
        var_dump($secondCall);die;
    }
}

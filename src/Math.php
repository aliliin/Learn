<?php

/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/5/1
 * Time: 上午7:37
 */
class Math
{
    public static function add()
    {
        return array_sum(func_get_args());
    }
}

//$math = new Math();
//var_dump($math->add(1,2,3,4));
echo Math::add(3, 4, 5);

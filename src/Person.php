<?php
namespace  Laravist;
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/4/30
 * Time: 下午7:01
 */
class Person
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

}
<?php
namespace  Laravist;
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/4/30
 * Time: 下午7:01
 */
class Staff{
    protected $members = [];
    public function add(Person $person)
    {
        $this->members[] = $person;
    }
}
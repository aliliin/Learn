<?php

namespace Learn;

/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/4/30
 * Time: 上午11:30
 */
class Person
{
    public $name;
    public $age;
    public function __construct($name)
    {
        $this->name = $name;

    }

    /**
     * @return mixed
     */
    public function setAge($age)
    {
        if ($age < 18) {
            throw new ErrorException('not old enough');
        }
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }
}

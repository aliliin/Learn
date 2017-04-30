<?php
require 'vendor/autoload.php';
/*
class Person{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

}
class Business{
    protected $staff;

    public function __construct(Staff $staff)
    {
        $this->staff = $staff;
    }

    public  function hire(Person $person)
    {
        $this->staff->add($person);
    }

}
class Staff{
    protected $members = [];
    public  function add(Person $person)
    {
        $this->members[] = $person;
    }
}
*/
$jelly = new Laravist\Person('jellyBool');
$staff = new Laravist\Staff();
$laravist = new Laravist\Business($staff);
$laravist->hire($jelly);

var_dump($staff);
<?php
namespace Laravist;

/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/4/30
 * Time: 下午7:26
 */
class Business
{
    protected $staff;

    public function __construct(Staff $staff)
    {
        $this->staff = $staff;
    }

    public function hire(Person $person)
    {
        $this->staff->add($person);
    }

}

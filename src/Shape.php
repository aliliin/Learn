<?php

/**
 * Created by PhpStorm.
 * User: ali
 * Date: 2017/4/30
 * Time: 下午12:04
 */
abstract class Shape
{
    public $color;

    public function __construct($color = 'red')
    {
        $this->color = $color;
    }
    public function getColor()
    {
        return $this->color;
    }
    abstract public function getArea();
}

class Square extends Shape
{
    protected $length = 4;
    public function getArea()
    {
        return pow($this->length, 2);
    }
}

class Circle extends Shape
{
    public function getArea()
    {
        return 11;
    }
}
$shape = new Circle();
var_dump($shape);

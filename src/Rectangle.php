<?php

class Rectangle
{
    public function __construct($sideA, $sideB)
    {
        $this->sideA = $sideA;
        $this->sideB = $sideB;
    }
    public function getArea()
    {
        return $this->sideA * $this->sideB;
    }
    public function getPerimeter()
    {
        return ($this->sideA + $this->sideB) * 2;
    }
}

class Circle
{
    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getArea()
    {
        return (pi() * $this->radius ** 2);
    }

    public function getPerimeter()
    {
        return (2 * pi() * $this->radius);
    }
}

$circy = new Circle(11);
echo $circy->getArea();

$circy = new Circle(4.44);
echo $circy->getPerimeter();

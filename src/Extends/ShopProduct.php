<?php
namespace Learn\Extend;

class ShopProduct
{
    private $title;
    private $producerMainName;
    private $producerFirstName;
    private $price;
    private $discount = 0;

    public function __construct(
        string $title, string $firstName, string $mainName, float $price
    ) {
        $this->title             = $title;
        $this->producerMainName  = $mainName;
        $this->producerFirstName = $firstName;
        $this->price             = $price;
    }

    public function getproducerFirstName()
    {
        return $this->producerFirstName;
    }

    public function getproducerMainName()
    {
        return $this->producerMainName;
    }

    public function setDiscount($num)
    {
        $this->discount = $num;
    }
    public function getDiscount($num)
    {
        return $this->discount;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getPrice()
    {
        return ($this->price - $this->discount);
    }
    public function getProduct()
    {
        return $this->producerFirstName . " " . $this->producerMainName;
    }
    public function getSummaryLine()
    {
        $base = "{$this->title} ({$this->producerMainName},";
        $base .= "{$this->producerFirstName})";
        return $base;
    }
}

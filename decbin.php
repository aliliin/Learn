<?php

//  decbin 十进制转二进制
// 0 ➞ 0
// 100 ➞ 3
// 999 ➞ 8

class Decbin
{
    public static function countOneNumber($number)
    {
        return substr_count(decbin($number), 1);
        // return array_sum(str_split(decbin($i)));
    }
}
$number    = 999;
$newNumber = Decbin::countOneNumber($number);
echo $newNumber;
die;

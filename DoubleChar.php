<?php

//  Create a function that takes a string and returns a string in which each character is repeated once.
// 创建一个接受字符串并返回一个字符串的函数，其中每个字符重复一次。

/**
"String" ➞ "SSttrriinngg"

"Hello World!" ➞ "HHeelllloo  WWoorrlldd!!"

"1234!_ " ➞ "11223344!!__  "

 */

$string       = 'beijing';
$doubleString = '';

foreach (str_split($string) as $str) {
    $doubleString .= $str . str;
}

echo $doubleString;

// 创建一个接受字符串并返回中间字符的函数。如果单词的长度为奇数，则返回中间字符。如果单词的长度是偶数，则返回中间的两个字符。
/*
"test" ➞ "es"

"testing" ➞ "t"

"middle" ➞ "dd"

"A" ➞ "A"
 */

$arr = str_split("testing");
$num = count($arr);
if ($num % 2 === 0) {
    $num = $num / 2;
    echo substr('testing', $num - 1, 2);
} else {
    $num = ceil($num / 2);
    echo substr('testing', $num - 1, 1);
}

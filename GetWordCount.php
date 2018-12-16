<?php

/**
 * 创建一个接受字符串并返回单词计数的函数。字符串将是一个句子。
 * countWords("Just an example here move along") ➞ 6
 * countWords("This is a test") ➞ 4
 * countWords("What an easy task, right") ➞ 5
 */

class CountWords
{
    public function countWords($str)
    {
        return count(explode(' ', $str));
    }
}

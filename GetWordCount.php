<?php

/**
 * 创建一个接受字符串并返回单词计数的函数。字符串将是一个句子。
 * countWords("Just an example here move along") ➞ 6
 * countWords("This is a test") ➞ 4
 * countWords("What an easy task, right") ➞ 5
 */

//  str_word_count 函数
//  str_word_count — 返回字符串中单词的使用情况

class CountWords
{
    public function countWords($str)
    {
        return str_word_count($str);
        return count(explode(' ', $str));

    }
}

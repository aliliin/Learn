<?php
// 正则表达式的练习题

class Test
{
    // 创建一个函数，该函数接受一个字符串并返回一个新字符串，删除所有元音。
    // "I have never seen a thin person drinking Diet Coke." ➞ " hv nvr sn  thn prsn drnkng Dt Ck."
    public static function delAeiouStr($str)
    {
        return preg_replace('/[aeiou]/i', '', $str);
    }

    //  创建一个接受字符串并返回其中包含的元音数量（计数）的函数。
    //   "Celebration" ➞ 5
    public static function countAeiouNumber($str)
    {
        return strlen(preg_replace('/[^aeiou]/i', '', $str));
        return preg_match_all('/[^aeiou]/i', $str);
    }
    // 从字符串中删除特殊字符
    // 创建一个带字符串的函数，删除所有“特殊”字符（例如！@＃$％^＆\ *）并返回新字符串。允许的唯一非字母数字字符是破折号 - ，下划线_和空格。
    public static function removeSpecialCharacters($str)
    {
        return preg_replace('/[^A-Za-z0-9-\/ _]/', '', $str);
    }

    // 验证字符串必须是4位数和6位的数字字符
    public static function validationNumber($str)
    {
        return preg_match('/^(\d{6}|\d{4})$/', $str);
    }
}
// 创建一个函数，该函数接受一个字符串并返回一个新字符串，删除所有元音。
$str = "I have never seen a thin person drinking Diet Coke";
// echo Test::delAeiouStr($str);
echo '<br/>';

//  创建一个接受字符串并返回其中包含的元音数量（计数）的函数。
$str = "Celebration";
echo Test::countAeiouNumber($str);
// 创建一个带字符串的函数，删除所有“特殊”字符（例如！@＃$％^＆\ *）并返回新字符串。允许的唯一非字母数字字符是破折号 - ，下划线_和空格。
$str = "%fd76$fd(-)6GvKlO. ni kl lkk ";
echo Test::removeSpecialCharacters($str);
// 验证字符串必须是4位数和6位的纯数字字符
// $str = '+234'; false    $str = '-23455', false $str ='123456'; true
$str = '1235';
echo Test::validationNumber($str);

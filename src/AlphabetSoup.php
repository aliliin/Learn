
<?php

// 输出 ehllo
// "edabit" ➞ "abdeit"
$str = 'hello';

function longest($str)
{
    //转化成数组
    $arr = str_split($str);
    //数组排序
    array_multisort($arr);
    //转换成字符串
    return implode($arr);
}

echo longest($str);

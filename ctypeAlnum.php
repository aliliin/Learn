<?php
// ctype_alnum 做字母和数字字符检测
$str    = 'The quick brown fox';
$arr    = str_split($str);
$newStr = '';
foreach ($arr as $key => $string) {
    if (ctype_alnum($string)) {
        $newStr .= $string;
    } elseif ($string == '_' || $string == '-' || $string == ' ') {
        $newStr .= $string;
    }
}
echo $newStr;
die;

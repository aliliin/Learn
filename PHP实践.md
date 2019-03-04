#### 1、多维数组变一维数组
```
$result = [];
//无键值对
array_walk_recursive($arr, function ($value) use (&$result) {
    array_push($result, $value);
});
//有键值对
array_walk_recursive($arr, function ($value) use (&$result) {
    array_push($result, array_values($value));
});
```
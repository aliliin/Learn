<?php


namespace Learn;


class MagicMethods
{
    private $abc = ''; // 想要修改这个属性 要定义两个方法内置的 魔术方法

    // 使用魔术方法
    public function __set($var, $val)
    {
        $this->$var = $val;
    }

    public function __get($var)
    {
        return $this->$var;
    }

    // 判断一个属性是否存在
    public function __isset($var)
    {
        return isset($this->$var) ? true : false;
    }

    // 删除一个属性
    public function __unset($var)
    {
        unset($this->$var);
    }

    // 为了避免 调用了不存在的方法 产生的错误，我们可以使用 __call 方法
    public function __call($func, $arguments)
    {
        echo($func . '<br/>');
        print_r($arguments);
    }

    // 静态方法不存在
    public static function __callStatic($func, $args)
    {
        echo($func . '<br/>');
        print_r($args);
    }

    // 把对象当函数来使用。
    public function __invoke($args)
    {
        var_dump($args);
    }

    // 把对象当作字符串来打印的时候，会自动调用该方法。
    public function __toString()
    {
        echo ' TODO: Implement __toString() method.';
    }

    public function setAbc($val)
    {
        $this->abc = $val;
    }

    public function getAbc()
    {
        return $this->abc;
    }
}

//echo '<pre/>';
//$magicMethods = new MagicMethods();
//$magicMethods->setAbc('set private attribute');
//echo $magicMethods->getAbc();
//// 两种方法，
//echo '<br/>';
//$magicMethods->abc = '34sdfs';
//echo $magicMethods->abc;
// var_dump(isset($magicMethods->dd));
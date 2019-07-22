<?php


namespace Learn;


class StaticClass
{
    public static function who()
    {
        echo 'StaticClass 中的 who 方法';
    }

    public static function TestStaticClass()
    {
        // 如果有类继承了这个类，且 子类中没有   TestStaticClass 方法，但是有 who 方法，
        // 但是他依旧会输出 父类中的 who 方法
        // 只有在 把 此方法中的 self  换成 static 就可以了，
        // 这样子叫做 后期静态绑定。
        self::who();
    }
}


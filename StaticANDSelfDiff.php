<?php

// static、$this、self 区别
// static：如果在子类中重写了父类中的static方法、属性，父类就会去访问了子类的static方法
// self: 是类内指针，不管子类有没有重写过父类中的方法、属性都指向本类的静态方法、属性
// self::并static::做两件事。例如，self::或者__CLASS__是对当前类的引用，如此定义在某个范围内，它不足以满足前向静态调用的需要。

class A
{
    public static function className()
    {
        echo __CLASS__;
    }

    public static function test()
    {
        self::className();
    }
}

class C extends A
{
    public static function className()
    {
        echo __CLASS__;
    }
}
// 继承会发生什么？
echo C::test();
// 输出  A

// static:: 它具有预期的行为
class A
{
    public static function className()
    {
        echo __CLASS__;
    }

    public static function test()
    {
        static::className();
    }
}

class B extends A
{
    public static function className()
    {
        echo __CLASS__;
    }
}

B::test();
// 输出 B
// 它解决了调用运行时引用的类的限制。
// 考虑到这一点，我认为你现在可以充分地看到并解决问题。如果您继承了几个静态成员并且需要访问父级和子级成员是self::不够的。

<?php


namespace Learn\TraitLearn;


trait  Singleton
{
    private static $_instance = null;

    public static function getInstance()
    {
        $class = __CLASS__;

        if (!self::$_instance instanceof __CLASS__) {
            self::$_instance = new $class;
        }
        return self::$_instance;
    }


}
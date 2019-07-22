<?php


class DBReadConnection extends PDO
{

    use \Learn\TraitLearn\Singleton;

    private function __construct()
    {
        parent::__construct('mysql:host=mysql;dbname=mysql', 'root', 'root');
    }
}
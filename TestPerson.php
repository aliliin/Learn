<?php

use Learn\Person;
//require 'src/Person.php';

$gao = new Person( 'gaoyongli');
$gao->setAge(30);
$gao->age = 17;
var_dump($gao->getAge());


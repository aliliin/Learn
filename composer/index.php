<?php
require  'vendor/autoload.php';
$engine = new Mustache_Engine();
echo $engine->render('hello {{name}}',['name'=> 'GaoYongli']);

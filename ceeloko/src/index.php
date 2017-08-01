<?php
/**
 * Created by PhpStorm.
 * User: bernardovieira
 * Date: 30-07-2017
 * Time: 17:28
 */

spl_autoload_register(function ($class_name) {
    include str_replace('\\', '/', $class_name) . '.php';
});

use HelloWorld\SayHello as Say;

$say = new Say(2);

echo $say->world();
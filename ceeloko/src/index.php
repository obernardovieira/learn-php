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

$service_url = 'http://localhost:3000/users/';
$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, false);
$curl_response = curl_exec($curl);
curl_close($curl);

$decoded = json_decode($curl_response);
echo $decoded;
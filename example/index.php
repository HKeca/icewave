<?php

require_once "../vendor/autoload.php";

use icewave\Router;

$router = new Router();

function testFunc() {
    echo "This is a test";
    return;
}

function thisTest() {
    echo "Heya";
    return;
}

$router->get('/test', 'testFunc');

$URI = $_SERVER['REQUEST_URI'];
$METHOD = $_SERVER['REQUEST_METHOD'];

$router->find($URI, $METHOD);
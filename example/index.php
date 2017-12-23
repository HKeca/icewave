<?php

require_once "../vendor/autoload.php";

use icewave\Router;
use icewave\Middleware;

class testMiddleware extends Middleware
{
    public function run() {
        echo "Middleware: \n";
        return;
    }
}

$testMiddleware = new testMiddleware();

$router = new Router();

function testFunc() {
    echo "This is a test";
    return;
}

$router->get('/test', 'testFunc');

$router->middleware($testMiddleware);

$URI        = $_SERVER['REQUEST_URI'];
$METHOD     = $_SERVER['REQUEST_METHOD'];

$router->find($URI, $METHOD);
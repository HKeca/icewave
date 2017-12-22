<?php

namespace icewave;

use icewave\RouteCollection;
use icewave\Route;

class Router
{
    /**
     * Collection of routes
     * 
     * @var array
     */
    private $collection;

    /**
     * Router
     */
    public function __construct() {
        $this->collection = new RouteCollection();
    }

    /**
     * Create a new get route
     * 
     * @param  string $uri      the uri
     * @param  string $function the function to run
     * @return void
     */
    public function get($uri, $function) {
        $newRoute = new Route($uri, array("GET"), $function);

        $this->collection->addRoute($newRoute);
    }

    /**
     * Create a new post route
     * 
     * @param  string $uri      the request uri
     * @param  string $function the function definition
     * @return void
     */
    public function post($uri, $function) {
        $newRoute = new Route($uri, array("POST"), $function);

        $this->collection->addRoute($newRoute);
    }

    /**
     * Create a new put route
     * 
     * @param  string $uri      the request uri
     * @param  string $function the function definition
     * @return void
     */
    public function put($uri, $function) {
        $newRoute = new Route($uri, array("PUT"), $function);

        $this->collection->addRoute($newRoute);
    }

    /**
     * Create a new patch route
     * 
     * @param  string $uri      the request uri
     * @param  string $function the function definition
     * @return void
     */
    public function patch($uri, $function) {
        $newRoute = new Route($uri, array("PATCH"), $function);

        $this->collection->addRoute($newRoute);
    }

    /**
     * Create a new delete route
     * 
     * @param  string $uri      the request uri
     * @param  string $function the function definition
     * @return void
     */
    public function delete($uri, $function) {
        $newRoute = new Route($uri, array("DELETE"), $function);

        $this->collection->addRoute($newRoute);
    }

    /**
     * Find and call the route action
     *   
     * @param  string $uri     the request uri
     * @param  array $methods  the request methods
     * @return void
     */
    public function find($uri, $methods) {
        $route = $this->collection->match($uri, $methods);

        if ($route == false) { 
            echo "404";
            return;
        }

        $this->run($route->action);
    }

    /**
     * Run a function
     * 
     * @param  sting $func function
     * @return void
     */
    private function run($func) {
        if (is_callable($func)) {
            call_user_func($func);
        }
    }
}
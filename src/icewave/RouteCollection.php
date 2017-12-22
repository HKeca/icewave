<?php

namespace icewave;

use icewave\Route;

class RouteCollection
{
    /**
     * Route collection
     * 
     * @var array
     */
    public $routes;

    /**
     * RouteCollection
     */
    public function __construct() {
        $this->routes = array();
    }

    /**
     * Add to the route array
     * 
     * @param Route $route the route to add
     */
    public function addRoute(Route $route) {
        if (in_array($route, $this->routes) == false) {
            array_push($this->routes, $route);
        }

        return;
    }

    /**
     * Match the uri to the route
     * 
     * @param  string $uri the request uri
     * @return Route|boolean
     */
    public function match($uri, $method) {
        foreach ($this->routes as $route) {
            if ($route->uri == $uri && $this->matchesMethod($route, $method)) {
                return $route;
            }
        }

        return false;
    }

    /**
     * Check if the method matches requested uri
     * 
     * @param  Route $route  the route
     * @param  string $method the request method
     * @return boolean         if the requested method matches
     */
    private function matchesMethod($route, $method) {
        if (in_array($method, $route->methods))
            return true;
        else
            return false;
    }
}
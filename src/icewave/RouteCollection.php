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
     * Middleware collection
     * 
     * @var array
     */
    public $middleware;

    /**
     * RouteCollection
     */
    public function __construct() {
        $this->routes = array();
        $this->middleware = array();
    }

    /**
     * Add to the route the stack
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
     * @param  string $method the requested method
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

    /**
     * Add middleware to the stack
     *
     * @param Middleware $middleware the middleware
     * @return void
     */
    public function addMiddleware(Middleware $middleware) {
        if (in_array($middleware, $this->middleware) == false) {
            array_push($this->middleware, $middleware);
        }

        return;
    }
}
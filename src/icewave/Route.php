<?php

namespace icewave;

class Route
{
    /**
     * Uri pattern
     * 
     * @var string
     */
    public $uri;

    /**
     * Methods the route responds to
     * 
     * @var array
     */
    public $methods;

    /**
     * The actions to run when the route is requested.
     * 
     * @var string
     */
    public $action;

    /**
     * Setup a route
     * 
     * @param  string $uri     the route
     * @param  array $methods http methods
     * @param  string $action  array of actions to run
     */
    public function __construct($uri, $methods, $action) {
        $this->uri      = $uri;
        $this->methods  = $methods;
        $this->action   = $action;
    }
}
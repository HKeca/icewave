<?php

namespace icewave;

abstract class Middleware
{
    /**
     * This function runs before each request is processed
     */
    abstract public function run();
}
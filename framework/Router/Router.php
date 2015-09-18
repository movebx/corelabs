<?php

namespace Framework\Router;


class Router
{
    private $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }
} 
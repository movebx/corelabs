<?php

namespace Framework\Router;


use Framework\DI\Service;

class Router
{
    private $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function getRoute()
    {
        $request = Service::get('request');
        $uri = $request->getURI();
        if($uri != '/')
            rtrim($uri, '/');

        foreach($this->routes as $route => $value)
        {

        }






    }
} 
<?php

namespace Framework\Router;


use Framework\DI\Service;

class Router
{
    const DLMTR = '~';

    private $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function attemptToFindRoute()
    {
        $request = Service::get('request');
        $uri = $request->getURI();
        if($uri != '/')
            rtrim($uri, '/');

        $result = NULL;
        foreach($this->routes as $route => $rContent)
        {
            $requirements = isset($rContent["_requirements"]) ? $rContent["_requirements"] : NULL;

            $pattern = preg_replace('~\{\w+\}~',
                isset($requirements["id"]) ? '('.$requirements["id"].')' : '([\w\d]+)',
                $rContent['pattern']);

            if(preg_match(self::DLMTR."^".$pattern."$".self::DLMTR, $uri, $match))
            {
                if(isset($requirements["_method"]) && $requirements["_method"] !== $request->getMethod())
                    return false;

                $result = $this->routes[$route];
                $result['name'] = $route;
                if(!empty($match[1]))
                    $result['variable'] = $match[1];
                return $result;
            }
        }

        //@TODO::SECURITY!
    }
} 
<?php

namespace Framework\Router;


use Framework\DI\Service;

class Router
{
    const DLMTR = '~';

    static public $currentRoute;

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
            //����� �������� ���� ������� ��������� � requirements � ����������� ������������� (c)����





            if(preg_match(self::DLMTR."^".$pattern."$".self::DLMTR, $uri, $match) && isset($requirements["_method"]))
            {

                if($requirements["_method"] !== $request->getMethod())
                    continue;


                $result = $this->routes[$route];
                $result['name'] = $route;
                if(!empty($match[1]))
                    $result['variables'] = [$match[1]];
                
                self::$currentRoute = $result;
                return $result;
            }

            if(preg_match(self::DLMTR."^".$pattern."$".self::DLMTR, $uri, $match))
            {

                $result = $this->routes[$route];
                $result['name'] = $route;
                if(!empty($match[1]))
                    $result['variables'] = [$match[1]];

                self::$currentRoute = $result;
                return $result;
            }

        }
    }
} 
<?php

namespace Framework\Router;


use Framework\DI\Service;
use Framework\Request\Request;
use Framework\Response\ResponseRedirect;

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





                if(isset($rContent['security']))
                {
                    $routeSecurity = $rContent['security'];
                    $security = Service::get('security');

                    $c = 0;
                    for ( ; ; )
                    {
                        if ($c > count($routeSecurity) - 1)
                        {
                            break;
                        }
                        switch($routeSecurity[$c])
                        {
                            case 'ROLE_USER':
                                $user = $security->getUser();
                                if(is_null($user))
                                {
                                    $host = Request::getHost();
                                    $redirect = new ResponseRedirect($host.$security->loginRoute);
                                    $redirect->send();
                                }
                                break;
                            //continue security
                        }
                        ++$c;
                    }
                }



                $result = $this->routes[$route];
                $result['name'] = $route;
                if(!empty($match[1]))
                    $result['variables'] = [$match[1]];
                
                self::$currentRoute = $result;
                return $result;
            }

            if(preg_match(self::DLMTR."^".$pattern."$".self::DLMTR, $uri, $match))
            {




                if(isset($rContent['security']))
                {
                    $routeSecurity = $rContent['security'];
                    $security = Service::get('security');

                    $c = 0;
                    for ( ; ; )
                    {
                        if ($c > count($routeSecurity) - 1)
                        {
                            break;
                        }
                        switch($routeSecurity[$c])
                        {
                            case 'ROLE_USER':
                                $user = $security->getUser();
                                if(is_null($user))
                                {
                                    $host = Request::getHost();
                                    $redirect = new ResponseRedirect($host.$security->loginRoute);
                                    $redirect->send();
                                }
                                break;
                            //continue security
                        }
                        ++$c;
                    }
                }



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
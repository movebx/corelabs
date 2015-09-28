<?php

namespace Framework\Controller;

 use Framework\DI\Service;

 abstract class Controller
{
     public function getRequest()
     {
        return Service::get('request');
     }

     public function generateRoute($name)
     {
        $routes = Service::getConfig('routes');

         return array_key_exists($name, $routes) ? $routes[$name]['pattern'] : NULL;
     }

     public function redirect()
     {

     }
} 
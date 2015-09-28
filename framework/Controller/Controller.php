<?php

namespace Framework\Controller;

 use Framework\DI\Service;
 use Framework\Renderer\Renderer;

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

     public function render($view, $data = [])
     {
        $viewPath = $this->getViewPath($view);
        $renderer = new Renderer($viewPath);

         return $renderer->getContentBuffer();
     }

     public function redirect()
     {

     }

     protected function getViewPath($view)
     {
         $basePath = Service::getConfig('basePath');
         $name = Service::getConfig('name');

         

         //$path = $basePath.'\\src\\'.str_replace(['Controller', '\\\\'], ['', '/'], get_class($this)).'\\'.$view.'.php';

         return str_replace('\\', '/', $path);
     }
} 
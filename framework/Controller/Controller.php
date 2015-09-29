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

         return;
     }

     public function redirect()
     {

     }

     protected function getViewPath($view)
     {
         $basePath = Service::getConfig('basePath');
         $name = Service::getConfig('name');

         //{
         $currentNamespace = explode('\\', get_class($this));
         $controllerName = str_replace('Controller', '', array_pop($currentNamespace));
         $appName = array_shift($currentNamespace);

         $path = $basePath.'\\src\\'.$appName.'\\views\\'.$controllerName.'\\'.$view.'.php';
         //}������ �������� ������, ���� ��������� ���������� �������� �� �����!!



         //$path = $basePath.'\\src\\'.str_replace(['Controller', '\\\\'], ['', '/'], get_class($this)).'\\'.$view.'.php';

         return str_replace('\\', '/', $path);
     }
} 
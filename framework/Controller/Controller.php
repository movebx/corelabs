<?php

namespace Framework\Controller;

 use Framework\DI\Service;
 use Framework\Renderer\Renderer;
 use Framework\Request\Request;
 use Framework\Response\Response;
 use Framework\Response\ResponseRedirect;

 abstract class Controller
{
     final public function __construct()
     {

     }
     public function getRequest()
     {
        return Service::get('request');
     }

     public function generateRoute($name)
     {
        $routes = Service::getConfig('routes');

         return array_key_exists($name, $routes) ? Request::getHost().$routes[$name]['pattern'] : NULL;
     }

     public function render($view, $data = [])
     {
         $viewPath = $this->getViewPath($view);
         //Service::get('logger')->log($viewPath);
         $renderer = new Renderer($viewPath, $data);
         $content = $renderer->getContentBuffer();

         return new Response($content);
     }

     public function redirect($url, $msg = '', $type = '')
     {
        if(($msg != '') || ($type != ''))
        {

            $type = ($type == '') ? 'success' : $type;

            Service::get('session')->setFlushMsg($type, $msg);
        }

         return new ResponseRedirect($url);
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
         //}Разбор работает хорошо, если структура приложения меняться не будет!!



         //$path = $basePath.'\\src\\'.str_replace(['Controller', '\\\\'], ['', '/'], get_class($this)).'\\'.$view.'.php';

         return str_replace('\\', '/', $path);
     }
} 
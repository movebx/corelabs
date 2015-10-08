<?php


namespace Framework\Renderer;


use Framework\DI\Service;
use Framework\Request\Request;
use Framework\Router\Router;

class Renderer
{
    protected $data = [];
    protected $_layout;
    protected $error_500;
    protected $viewPath;

    public function __construct($viewPath, $data)
    {
        $this->_layout = Service::getConfig('main_layout');
        $this->error_500 = Service::getConfig('error_500');
        $this->viewPath = $viewPath;

        $this->data = array_merge($this->data, $data);

    }

    public function getContentBuffer()
    {
        extract($this->data);

        $route = Router::$currentRoute;
        $getRoute = $this->getRouteClosure();
        $user = Service::get('security')->getUser();
        $include = $this->getIncludeClosure();
        $flush = Service::get('session')->getFlushMsgs();

        $generateToken = $this->getGenerateTokenClosure();//@TODO: describe below!






        if(file_exists($this->viewPath))
        {
            ob_start();
            include($this->viewPath);
            $content = ob_get_clean();
        }
        else
        {
            //@TODO::WARNINGS be
            $message = "Server error";
            $code = 500;

            ob_start();
            include($this->error_500);
            $content = ob_get_clean();
        }


        ob_start();
        include($this->_layout);
        $buffer = ob_get_clean();

        return $buffer;
    }

    public function getRouteClosure()
    {
        return function($name)
        {
            $routes = Service::getConfig('routes');

            foreach($routes as $routeName => $rContent)
                if($name == $routeName)
                {
                    $result = Request::getHost().$rContent['pattern'];
                    return $result;
                }

            return '';
        };
    }

    public function getIncludeClosure()
    {
        return function($controllerClass, $method, $params = [])
        {
            if(!class_exists($controllerClass))
                return;
            $class = new $controllerClass();

            $method .= 'Action';
            if(!method_exists($class, $method))
                return;

            $reflMethod = new \ReflectionMethod($controllerClass, $method);

            $response = $reflMethod->invokeArgs($class, $params);
            $response->paste();
        };
    }

    public function getGenerateTokenClosure()
    {
        return function()
        {

        };
    }
} 
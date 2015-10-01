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
        $generateToken = function(){};//@TODO: describe below!
        $include = function(){};
        $user = Service::get('security')->getUser();



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
} 
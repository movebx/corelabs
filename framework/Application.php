<?php


namespace Framework;

use Blog\Controller\TestController;
use Framework\DI\Service;
use Framework\Db\Connection;
use Framework\Exception\HttpNotFoundException;
use Framework\Log\Logger;
use Framework\Request\Request;
use Framework\Router\Router;

class Application
{
    private $_config;

    public function __construct($config)
    {
        $this->_config = require_once($config);
        Service::setConfig($this->_config);

        $logger = new Logger($this->_config['log']);
        Service::set('logger', $logger->getLogger());

        new Connection($this->_config['pdo']);
        Service::set('db', Connection::getDb());
        Service::set('router', new Router($this->_config['routes']));
        Service::set('request', new Request());



        Service::set('app', $this);
    }

    public function run()
    {
        //print_r($_SERVER);
        $router = Service::get('router');

        $route = $router->attemptToFindRoute();


        //$logger = Service::get('logger');
        //$logger->log('Fuck da shit');


        //print_r($route);
        //$test = new TestController();
        //echo $test->generateRoute('add_post');

    }

} 
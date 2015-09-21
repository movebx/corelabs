<?php


namespace Framework;


use Framework\DI\Service;
use Framework\Model\Connection;
use Framework\Router\Router;

class Application
{
    private $_config;

    public function __construct($config)
    {
        $this->_config = require_once($config);

        new Connection($this->_config['pdo']);
        Service::set('db', Connection::getDb());
        Service::set('router', new Router($this->_config['routes']));


    }
    public function run()
    {
        print_r($_SERVER);
    }
} 
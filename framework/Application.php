<?php


namespace Framework;


use Framework\DI\ServiceLocator;
use Framework\Model\Connection;
use Framework\Router\Router;

class Application
{
    private $_config;

    public function __construct($config)
    {
        $this->_config = require_once($config);

        new Connection($this->_config['pdo']);
        ServiceLocator::set('db', Connection::getDb());
        ServiceLocator::set('router', new Router($this->_config['routes']));


    }
    public function run()
    {

    }
} 
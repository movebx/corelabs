<?php


namespace framework;


use framework\DI\ServiceLocator;
use framework\Model\Connection;

class Application
{
    private $_config;

    public function __construct($config)
    {
        $this->_config = require_once($config);

        ServiceLocator::set('db', new \framework\Model\Connection($this->_config['pdo']));


    }
    public function run()
    {

    }
} 
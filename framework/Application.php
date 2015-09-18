<?php


namespace Framework;


use Framework\DI\ServiceLocator;
use Framework\Model\Connection;

class Application
{
    private $_config;

    public function __construct($config)
    {
        $this->_config = require_once($config);

        ServiceLocator::set('db', new Connection($this->_config['pdo']));


    }
    public function run()
    {

    }
} 
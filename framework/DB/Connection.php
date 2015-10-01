<?php

namespace Framework\Db;


use Framework\DI\Service;

class Connection
{
    static private $_pdo_;

    public function __construct($params)
    {
        $dns = $params['dns'];
        $user = $params['user'];
        $password = $params['password'];

        try
        {
            self::$_pdo_ = new \PDO($dns, $user, $password);

            register_shutdown_function([$this, 'closeConnection']);
        }
        catch (\PDOException $e)
        {
            $logger = Service::get('logger');
            $logger->log($e->getMessage(), 'WARNING');
            die('SQL CONNECTION ERROR: '.$e->getMessage());
        }
    }

    static public function getDb()
    {
        return self::$_pdo_;
    }

    static public function closeConnection()
    {
        self::$_pdo_ = NULL;
    }
}
<?php

namespace Framework\Db;


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
            die('SQL CONNECTION ERROR');/////////////////
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
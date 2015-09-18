<?php

namespace framework\Model;


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
            $pdo = new \PDO($dns, $user, $password);
            self::$_pdo_ = $pdo;
        }
        catch (\PDOException $e)
        {
            die('SQL CONNECTION ERROR');
        }
    }

} 
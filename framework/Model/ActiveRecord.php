<?php

namespace Framework\Model;


use Framework\DI\Service;

abstract class ActiveRecord
{
    protected $db;


    public function __construct()
    {
        $this->db = Service::get('db');


    }

    static public function find($id)
    {
        $db = Service::get('db');

        if($id == 'all')
            $query = 'SELECT * FROM '.static::getTable();
        else
            $query = 'SELECT * FROM '.static::getTable().' WHERE id = :id';

        $stmt = $db->prepare($query);
        $stmt->execute([':id' => $id]);

        $result = ($id == 'all') ? $stmt->fetchAll(\PDO::FETCH_OBJ) : $stmt->fetch(\PDO::FETCH_OBJ);

        return $result;
    }

    static public function findByEmail($email)
    {
        $db = Service::get('db');

        $query = 'SELECT * FROM '.static::getTable().' WHERE email = :email';

        $stmt = $db->prepare($query);
        $stmt->execute([':email' => $email]);

        $result = $stmt->fetch(\PDO::FETCH_OBJ);

        return $result;
    }

    static public function getTable()
    {

    }

    public function getRules()
    {
        return [];
    }

} 
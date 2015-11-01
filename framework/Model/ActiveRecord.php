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

    static public function findAll()
    {
        $db = Service::get('db');

        $query = 'SELECT * FROM '.static::getTable();

        $stmt = $db->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return $result;
    }

    static public function findById($id)
    {
        $db = Service::get('db');

        $query = 'SELECT * FROM '.static::getTable().' WHERE id = :id';

        $stmt = $db->prepare($query);
        $stmt->execute([':id' => $id]);

        $result = $stmt->fetch(\PDO::FETCH_OBJ);

        return $result;
    }

    static public function deleteById($id)
    {
        $db = Service::get('db');

        $query = "DELETE FROM ".static::getTable()." WHERE id = :id";
        $stmt = $db->prepare($query);

        return $stmt->execute([':id' => $id]);
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

    public function findBy($cell, $val)
    {
        $db = Service::get('db');
        $query = "SELECT * FROM ".static::getTable()." WHERE ".$cell." = :val";

        $stmt = $db->prepare($query);

        $stmt->execute([':val' => $val]);


        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    static public function getTable()
    {

    }

    public function getRules()
    {
        return [];
    }



} 
<?php

namespace Blog\Model;

use Framework\DI\Service;
use Framework\Model\ActiveRecord;
use Framework\Security\Model\UserInterface;
use Framework\Exception\DatabaseException;

class User extends ActiveRecord implements UserInterface
{
    public $id;
    public $email;
    public $password;
    public $role;

    public static function getTable()
    {
        return 'users';
    }

    public function getRole()
    {
        return $this->role;
    }

    public function save()
    {
        $db = Service::get('db');

        $query = 'INSERT INTO '.self::getTable().'(email, password, role) VALUES (:email, :password, :role)';

        $stmt = $db->prepare($query);

        if(!$stmt->execute([':email' => $this->email, ':password' => $this->password, ':role' => $this->role]))
            throw new DatabaseException('SQL BAD REQUEST');
    }

}
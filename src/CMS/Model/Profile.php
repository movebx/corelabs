<?php

namespace CMS\Model;


use Framework\DI\Service;
use Framework\Model\ActiveRecord;
use Framework\Validation\Filter\Length;

class Profile extends ActiveRecord
{
    public $id;
    public $name;
    public $email;
    public $password;

    static public function getTable()
    {
        return 'users';
    }

    public function getRules()
    {
        return [
                'name' =>[new Length(4, 10)],
                'email' => [new Length(5)],
                'password' => [new Length(4, 10)]
        ];
    }

    public function update()
    {
        $query = 'UPDATE '.self::getTable().' SET name = :name, email = :email, password = :password WHERE id = :id';

        $stmt = $this->db->prepare($query);

        $stmt->execute([':name' => $this->name, ':email' => $this->email, ':password' => $this->password, ':id' => $this->id]);
    }
} 
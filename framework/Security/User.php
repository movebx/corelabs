<?php

namespace Framework\Security;

use Framework\DI\Service;
use Framework\Model\ActiveRecord;
use Framework\Security\Model\UserInterface;
use Framework\Exception\DatabaseException;
use Framework\Router\Router;

class User extends ActiveRecord implements UserInterface
{
    public $id;
    public $login;
    public $password;
    public $role;
    public $name;

    protected $session;
    public $loginRoute;


    public static function getTable()
    {
        return 'users';
    }

    public function getRole()
    {
        return $this->role;
    }

    public function __construct()
    {
        $this->session = Service::get('session');
        
        $this->loginRoute = Service::getConfig('security')['login_route'];
    }

    public function save()
    {
        $db = Service::get('db');

        if(!isset($this->name))
        {
            $this->name = 'guest['.$this->getUserIp().']-'.rand(9999, 9999999);
        }

        $query = 'INSERT INTO '.self::getTable().'(login, password, role, name) VALUES (:login, :password, :role, :name)';

        $stmt = $db->prepare($query);

        if(!$stmt->execute([':login' => $this->login, ':password' => $this->password, ':role' => $this->role, ':name' => $this->name]))
            throw new DatabaseException('SQL BAD REQUEST');
    }

    public function isAuthenticated()
    {
        if ($this->session->get('authenticated'))
        {
            return $this->session->get('authenticated');
        }
        else
            return false;
    }

    public function setUser($user)
    {
        $this->session->set('authenticated', $user->id);
    }

    public function getUser()
    {
        $userId = $this->session->get('authenticated');

        if($userId != NULL)
        {
            $db = Service::get('db');
            $query = 'SELECT * FROM '.self::getTable().' WHERE id = :id';

            $stmt = $db->prepare($query);

            $stmt->execute([':id' => $userId]);

            return $stmt->fetch(\PDO::FETCH_OBJ);
        }

        return NULL;
    }

    public function clear()
    {
        $this->session->unsetSession('authenticated');
    }

    public function getUserIp()
    {
        return $_SERVER['REMOTE_ADDR'];
    }


}
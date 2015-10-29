<?php

namespace Blog\Model;

use Framework\DI\Service;
use Framework\Model\ActiveRecord;
use Framework\Router\Router;
use Framework\Security\Model\UserInterface;
use Framework\Exception\DatabaseException;

class User extends ActiveRecord implements UserInterface
{
    public $id;
    public $email;
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

        if(isset(Router::$currentRoute['security']['route']))
            $this->loginRoute = Router::$currentRoute['security']['route'];
        else
            $this->loginRoute = Service::getConfig('security')['login_route'];
    }

    public function save()
    {
        $db = Service::get('db');

        if(!isset($this->name))
        {
            $this->name = 'guest['.$this->getUserIp().']-'.rand(9999, 9999999);
        }

        $query = 'INSERT INTO '.self::getTable().'(email, password, role, name) VALUES (:email, :password, :role, :name)';

        $stmt = $db->prepare($query);

        if(!$stmt->execute([':email' => $this->email, ':password' => $this->password, ':role' => $this->role, ':name' => $this->name]))
            throw new DatabaseException('SQL BAD REQUEST');
    }

    public function isAuthenticated()
    {
        if ($this->session->get('authenticated'))
        {
            return ($this->session->get('authenticated') != NULL) ? true : false;
        }
        else
            return false;
    }

    public function setUser($user)
    {
        $this->session->set('authenticated', $user);
    }

    public function getUser()
    {
        return $this->session->get('authenticated');
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
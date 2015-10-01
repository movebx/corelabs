<?php

namespace Framework\Security;


use Framework\DI\Service;

class Security
{
    protected $session;

    public function __construct()
    {
        $this->session = Service::get('session');
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
} 
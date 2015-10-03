<?php

namespace Framework\Session;


use Framework\DI\Service;

class Session
{
    public $returnUrl;

    public  function __construct()
    {
        //ini_set('session.gc_maxlifetime', 1800);
        $this->start();

        //$this->returnUrl = $this->getReferrer();

        //$logger = Service::get('logger');
        //$logger->log($this->returnUrl);
    }

    public function start()
    {
        session_start();
    }

    public function destroy()
    {
        session_destroy();
    }

    static public function getId()
    {
        return session_id();
    }

    static public function getName()
    {
        return session_name();
    }

    public function unsetSession($var)
    {
        if(isset($_SESSION[$var]))
        {
            unset($_SESSION[$var]);
            return true;
        }
        return false;
    }

    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name)
    {
        return empty($_SESSION[$name]) ? NULL : $_SESSION[$name];
    }

} 
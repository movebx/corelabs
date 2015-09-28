<?php

namespace Framework\Session;


class Session
{
    public  function __construct()
    {
        //ini_set('session.gc_maxlifetime', 1800);
    }

    public function start()
    {
        session_start();
    }

    static public function destroy()
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

    static public function unsetSession($var)
    {
        if(isset($_SESSION[$var]))
        {
            unset($_SESSION[$var]);
            return true;
        }
        return false;
    }

    public static function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function get($name)
    {
        return empty($_SESSION[$name]) ? null : $_SESSION[$name];
    }

} 
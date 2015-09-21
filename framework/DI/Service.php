<?php


namespace Framework\DI;


class Service
{
    static private $_container_ = [];

    private function __construct()
    {

    }

    static public function set($name, $object)
    {
        self::$_container_[$name] = $object;
    }

    static public function get($name)
    {
        return array_key_exists($name, self::$_container_) ? self::$_container_[$name] : false;
    }
}
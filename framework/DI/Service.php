<?php


namespace Framework\DI;


class Service
{
    static protected  $_container_ = [];

    function __construct()
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

    static public function setConfig(&$config)
    {
        self::$_container_['config'] = $config;
    }

    static public function getConfig($key = 'o[-_-]o')
    {
        return array_key_exists($key, self::$_container_['config']) ?
            self::$_container_['config'][$key] :
            self::$_container_['config'];
    }
}
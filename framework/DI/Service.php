<?php


namespace Framework\DI;


use Framework\Response\Response;

class Service
{
    static protected  $_container_ = [];

    function __construct()
    {

    }

    static public function set($name, $object)
    {
        if(array_key_exists($name, self::$_container_))
        {
            $logger = self::get('logger');
            $logger->log('Container key exists, name conflict', "WARNING");
            (new Response('Name conflict, debug your app'))->send();
        }
        else
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
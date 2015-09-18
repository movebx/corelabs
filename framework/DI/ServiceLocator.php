<?php
/**
 * Created by PhpStorm.
 * User: Codebuster
 * Date: 17.09.2015
 * Time: 17:21
 */

namespace Framework\DI;


class ServiceLocator
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
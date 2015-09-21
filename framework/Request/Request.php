<?php


namespace Framework\Request;


class Request
{
    public function getMethod()
    {
        return trim($_SERVER['REQUEST_METHOD']);
    }

    public function getFullUrl()
    {
        $fullUrl = self::getHost();
        $fullUrl .= $_SERVER['REQUEST_URI'];

        return $fullUrl;
    }

    public function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
        elseif(!empty($_SERVER['QUERY_STRING']))
        {
            return trim($_SERVER['QUERY_STRING'], '/');
        }
    }

   static public function getHost()
    {
        $host = '';

        if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on'))
            $host .= 'https://';
        else
            $host .= 'http://';

        $host .= $_SERVER['SERVER_NAME'];

        return $host;
    }

    static public function getPort()
    {
        $port = 80;
        if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on'))
            $port = 443;

        return $port;
    }

    public function get($var)
    {
        return array_key_exists($var, $_GET) ? $_GET[$var] : NULL;
    }

    public function post($var)
    {
        return array_key_exists($var, $_POST) ? $_POST[$var] : NULL;
    }

} 
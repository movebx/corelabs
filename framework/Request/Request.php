<?php

namespace Framework\Request;

use Htmlpurifier\HtmlPurifierBuilder;

class Request
{
    public function isPost()
    {
        return 'POST' == $this->getMethod();
    }

    public function getMethod()
    {
        return trim($_SERVER['REQUEST_METHOD']);
    }

    public function getFullUrl()
    {
        $fullUrl = self::getHost();
        $fullUrl .= $this->getURI();

        return $fullUrl;
    }

    public function getURI()
    {
            return trim($_SERVER['REQUEST_URI']);
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
        if(array_key_exists($var, $_GET))
            return $this->filter($_GET[$var]);
        return NULL;
    }

    static public function getReferrer()
    {
        return isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : NULL;
    }

    public function post($var)
    {
        if(array_key_exists($var, $_POST))
            return $this->filter($_POST[$var]);
        return NULL;
    }

    public function filter($str)
    {
        $htmlPurifierBuilder = new HtmlPurifierBuilder();
        $purifier = $htmlPurifierBuilder->execute();
        //$purifier->delInvalidTags(true);
        return $purifier->purify($str);
    }

} 
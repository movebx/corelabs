<?php

namespace Framework\Response;


use Framework\Request\Request;

class ResponseRedirect implements  iResponse
{
    public $code;
    public $url;
    public $replace;

    public function __construct($uri, $replace = true, $code = 302)
    {

        $this->url = Request::getHost().$uri;
        $this->code = $code;
        $this->replace = $replace;
    }

    public function send()
    {
        header('Location: '.$this->url, $this->replace, $this->code);
        exit();
    }
} 
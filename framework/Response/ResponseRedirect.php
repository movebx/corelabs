<?php

namespace Framework\Response;


use Framework\Request\Request;

class ResponseRedirect implements  iResponse
{
    public $code;
    public $url;
    public $replace;

    public function __construct($url, $replace = true, $code = 302)
    {

        $this->url = $url;
        $this->code = $code;
        $this->replace = $replace;
    }

    public function send()
    {
        header('Location: '.$this->url, $this->replace, $this->code);
        exit();
    }
} 
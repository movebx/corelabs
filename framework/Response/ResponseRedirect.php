<?php

namespace Framework\Response;


use Framework\DI\Service;


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
        //$logger = Service::get('logger');

       // $logger->log(Router::$currentRoute);
        $request = Service::get('request');

        header('Referer: '.$request->getFullUrl());
        header('Location: '.$this->url, $this->replace, $this->code);
        exit();
    }
} 
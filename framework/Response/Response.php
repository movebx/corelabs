<?php


namespace Framework\Response;


class Response
{
    public $code;
    public $headers = [];
    public $responseMessage;
    public $type;
    public $content;

    public function __construct($content, $code = 200, $msg = 'OK', $type = 'html')
    {

    }



} 
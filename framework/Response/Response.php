<?php


namespace Framework\Response;


use Framework\DI\Service;

class Response implements iResponse
{
    public $code;
    public $headers;
    public $responseMessage;
    public $type;
    public $content;
    public $htProtocol;

    public function __construct($content, $code = 200, $msg = 'OK', $headers = [], $type = 'text/html')
    {
        $this->content = $content;
        $this->code = $code;
        $this->responseMessage = $msg;
        if(!empty($headers))
            $this->headers = $headers;
        $this->type = $type;
        $this->htProtocol = $_SERVER['SERVER_PROTOCOL'];
    }

    public function send()
    {
        $charset = Service::getConfig('charset');
        header($this->htProtocol.' '.$this->code.' '.$this->responseMessage);
        header('Content-Type: '.$this->type.'; charset='.$charset);
        header('Pragma: no-cache');
        if(!empty($this->headers))
            foreach($this->headers as $header)
                header($header);

        echo $this->content;
        exit();
    }

    public function sendError()
    {
        header($this->htProtocol.' '.$this->code.' '.$this->responseMessage);
        header('Status: '.$this->code.' '.$this->responseMessage);
        if(!empty($this->headers))
            foreach($this->headers as $header)
                header($header);

        echo $this->content;
        exit();
    }

    public function paste()
    {
        echo $this->content;
    }

} 
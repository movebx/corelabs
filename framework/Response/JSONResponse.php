<?php

namespace Framework\Response;

use Framework\DI\Service;

class JSONResponse implements iResponse
{
    public $code;
    public $headers;
    public $responseMessage;
    public $type;
    public $content;
    public $htProtocol;

    public function __construct($content, $code = 200, $msg = 'OK', $headers = [], $type = 'application/json')
    {
        $this->content = $content;
        $this->code = $code;
        $this->responseMessage = $msg;
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

        echo json_encode($this->content);
    }
}
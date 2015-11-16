<?php

namespace Framework\Exception;


use Framework\Response\Response;

class ServerException extends \Exception
{
    public function crashed()
    {
        $response = new Response($this->getMessage(), $this->getCode(), 'Server Error');
        $response->sendError();
    }
} 
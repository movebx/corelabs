<?php


namespace Framework\Exception;

use Framework\Response\Response;

class HttpNotFoundException extends \Exception
{

    public function show404page($msg = 'Not Found')
    {
        $content = str_replace('\\', '/', '<body style="background-image: url(/images/system/natfaund.jpg); background-size: 100% 112%;"></body>');

        $response = new Response($content, 404, (empty($this->message)) ? $msg :  $this->message);
        $response->sendError();

    }

} 
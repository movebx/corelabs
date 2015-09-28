<?php


namespace Framework\Exception;


class HttpNotFoundException extends \Exception
{

    public function show404page()
    {
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');

        echo str_replace('\\', '/', '<body style="background-image: url(/images/system/natfaund.jpg); background-size: 100% 112%;"></body>');
    }

} 
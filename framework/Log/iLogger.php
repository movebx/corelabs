<?php

namespace Framework\Log;


interface iLogger
{
    public function __construct($logsPath);

    public function log($message, $level);
} 
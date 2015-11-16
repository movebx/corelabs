<?php

namespace Framework\Log;


class Logger
{
    const TARGET = 'Target';

    protected $_loggers;
    protected $_logs;
    protected $_name;

    static public $startTime;

    public function __construct($log)
    {
        $this->_loggers = $log['loggers'];
        $this->_logs = $log['logs'];
        $this->_name = $log['target'];

    }

    public function getLogger()
    {
        $logger = $this->_loggers.'\\'.ucfirst($this->_name).self::TARGET;
        $logger = new $logger($this->_logs);

        return ($logger instanceof iLogger) ? $logger : NULL;
    }

    static public function startScriptTime()
    {
        self::$startTime = microtime(true);
    }

    static public function getScriptTime()
    {
        return (microtime(true) - self::$startTime);
    }

} 
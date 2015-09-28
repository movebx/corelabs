<?php

namespace Framework\Log\Loggers;


use Framework\Log\iLogger;
use Framework\Log\Logger;

class FileTarget implements iLogger
{
    const NEWLINE = PHP_EOL;

    protected $_logFile;


    public function __construct($logs)
    {
        $this->_logFile = $logs['address'];
    }

    public function log($message, $level)
    {
        $datetime = '['.@date("d-m-Y H:i:s").']';
        $queryTime = '[qtime:'.round(Logger::getScriptTime(), 4).']';

        if(!file_exists($this->_logFile))
            file_put_contents($this->_logFile, $this->getLogo());

        $fopen = fopen($this->_logFile, 'a');

        fwrite($fopen, $datetime.$queryTime.self::NEWLINE);

        fclose($fopen);
    }

    private function getLogo()
    {
        return "¶¶¶¶¶¶``¶¶¶¶¶¶``¶¶``````¶¶¶¶¶```````````¶¶```````¶¶¶¶````¶¶¶¶````¶¶¶¶```¶¶¶¶¶```¶¶¶¶¶\n
¶¶````````¶¶````¶¶``````¶¶``````````````¶¶``````¶¶``¶¶``¶¶``````¶¶``````¶¶``````¶¶``¶¶\n
¶¶¶¶``````¶¶````¶¶``````¶¶¶¶````¶¶¶¶¶```¶¶``````¶¶``¶¶``¶¶`¶¶¶``¶¶`¶¶¶``¶¶¶¶````¶¶¶¶¶\n
¶¶````````¶¶````¶¶``````¶¶``````````````¶¶``````¶¶``¶¶``¶¶``¶¶``¶¶``¶¶``¶¶``````¶¶``¶¶\n
¶¶``````¶¶¶¶¶¶``¶¶¶¶¶¶``¶¶¶¶¶```````````¶¶¶¶¶¶```¶¶¶¶````¶¶¶¶````¶¶¶¶```¶¶¶¶¶```¶¶``¶¶\n

#############################################################################################\n\n\n
";
    }
} 
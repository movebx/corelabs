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

    public function log($message, $level = 'NOTICE')
    {
        $datetime = '['.@date("d-m-Y H:i:s").']';
        $queryTime = '[qt:'.round(Logger::getScriptTime(), 4).']:';

        if(!file_exists($this->_logFile))
            file_put_contents($this->_logFile, $this->getLogo());

        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        $line = $backtrace[1]['line'];
        $file = $backtrace[1]['file'];
        $type = $backtrace[1]['type'];
        $func = $backtrace[1]['function'];

        $fopen = fopen($this->_logFile, 'a');

        fwrite($fopen,
               $datetime.$queryTime.self::NEWLINE.'['.$level.']'.$file.' in line '.$line.', function: '.@$type.@$func.'()'.self::NEWLINE.
               '[MESSAGE]'.$message.self::NEWLINE.'----------------------------------------------------'.self::NEWLINE);

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
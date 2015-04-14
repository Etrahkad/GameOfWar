<?php

namespace Application\Controller;

/**
 * Description of Log
 *
 * @author tdubois
 */
class Log {
    protected static $currentLog = array();
    
    protected static $outputLocation = './output.txt';
    
    public static function log($message) {
        self::$currentLog[] = $message;
        echo $message, "\n";
    }
    
    public static function clearLog() {
        self::$currentLog = array();
    }
    
    public static function outputLog($filePath = null) {
        if ($filePath) {
            self::$outputLocation = $filePath;
        }
        
        unlink(self::$outputLocation);
        $file = fopen(self::$outputLocation, 'w');
        foreach (self::$currentLog as $msg) {
            fputs($file, $msg."\n", strlen($msg."\n"));
        }
        
        fclose($file);
    }
}

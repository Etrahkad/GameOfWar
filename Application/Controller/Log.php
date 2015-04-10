<?php

namespace Application\Controller;

/**
 * Description of Log
 *
 * @author tdubois
 */
class Log {
    protected static $currentLog = array();
    
    public static function log($message) {
        self::$currentLog[] = $message;
    }
    
    public static function clearLog() {
        self::$currentLog = array();
    }
    
    public static function outputLog($filePath = '/tmp/output.txt') {
        $txt_file = implode("\n", self::$currentLog);
        
        file_put_contents($filePath, $txt_file);
    }
}

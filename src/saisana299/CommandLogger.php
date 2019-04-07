<?php

namespace saisana299;


class CommandLogger {
    private $logResource;
    public function __construct($logPath) {
        touch($logPath);
        $this->logResource = fopen($logPath, 'a');
    }
    public function __destruct() {
        fclose($this->logResource);
    }
    public function log($message)
    {
        fwrite($this->logResource, "<" . date("Y/m/d H:i:s") . ">" . $message . PHP_EOL);
    }
} 

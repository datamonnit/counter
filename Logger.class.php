<?php

class Logger {

    public $logfile;

    function __construct($filename){
        $this->logfile = $filename;
    }

    function addArrayToLog($errorArray){
        array_unshift($errorArray, date("l jS \of F Y h:i:s A"));
        $file_content = file_get_contents($this->logfile);
        $file_content = implode(",", $errorArray) . PHP_EOL . $file_content;
        file_put_contents($this->logfile, $file_content);
    }

}
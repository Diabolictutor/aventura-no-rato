<?php

abstract class ARBase {
    
    private $scenario;
    
    public function __construct($scenario = 'insert') {
        $this->scenario = $scenario;
    }

    private function connect() {
        global $serverName, $dbUser, $dbName, $dbPass;

        if (!mysql_connect($serverName, $dbUser, $dbPass)) {
            return false;
        }

        return mysql_select_db($dbName);
    }
    
    public function save() {
        
    }
    
    public function find() {
        
    }

}
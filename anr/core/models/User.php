<?php

class User {

    private $userID;
    private $email;
    private $password;
    private $name;
    private $group;
    private $signature;
    private $website;
    private $lastLogin;
    private $active;
    private $avatar;
    private $postPerPage;
    private $newRecord;

    public function __construct($newRecord = true) {
        $this->newRecord = $newRecord;
    }

    private function connect() {
        global $serverName, $dbUser, $dbName, $dbPass;

        if (!mysql_connect($serverName, $dbUser, $dbPass)) {
            return false;
        }

        return mysql_select_db($dbName);
    }

    public function save() {

        if ($this->newRecord) {

            $this->connect();
            mysql_query(sprintf("INSERT INTO User (
                    `email`, 
                    `password`,
                    `name`,
                    `group`,
                    `signature`,
                    `website`,
                    `lastLogin`,
                    `active`,
                    `avatar`,
                    `postPerPage`) 
                    VALUES ('%s', '%s', '%s', %d, '%s', '%s', '%s', %d, '%s')", 
                    $this->email, 
                    $this->password, 
                    $this->name, 
                    $this->group, 
                    $this->signature, 
                    $this->website, 
                    $this->lastLogin, 
                    $this->active, 
                    $this->avatar));
            $this->userID=mysql_insert_id();
            mysql_close();
        } else {
            $this->connect();
            mysql_query(sprintf("UPDATE User SET 
                    `email` = '%s', 
                    `password` = '%s',
                    `name` = '%s',
                    `group` = %d,
                    `signature` = '%s',
                    `website` = '%s',
                    `lastLogin` = '%s',
                    `active` = %d,
                    `avatar` = '%s',
                    `postPerPage` = '%s') 
                    )", 
                    $this->email, 
                    $this->password, 
                    $this->name, 
                    $this->group, 
                    $this->signature, 
                    $this->website, 
                    $this->lastLogin, 
                    $this->active, 
                    $this->avatar));
            mysql_close();
        }
    }

    public function find() {
        
    }

    public function findAll() {
        
    }

    public function findByPk() {
        
    }

    public function count() {
        
    }

    public function delete() {
        
    }

    public function deleteAll() {
        
    }

}

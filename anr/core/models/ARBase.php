<?php

/* ARBase.php
 * 
 * This file is part of Aventura no Rato! A browser based, adventure type, game.
 * Copyright (C) 2011  Diogo Samuel, Jorge Gonçalves, Pedro Pires e Sérgio Lopes
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>. 
 */

/**
 * Generic abstract class that is the base for all <em>Active Record</em> classes.
 * This class provides only limited basic features as an example and common ground 
 * for creating all other model classes.
 */
abstract class ARBase {

    /**
     * Flag that indicates if the class represents a new record, not 
     * yet stored in the database. 
     * 
     * @var integer
     */
    public $newRecord;

    /**
     * The name of the database table that relates to this model. It 
     * should be filled automatically but can be changed after the model is created. 
     * 
     * @var string
     */
    public $table;

    public function __construct($newRecord = true) {
        $this->newRecord = $newRecord;
        $this->table = get_class();
    }

    /**
     * Creates a database connection to be used in subsequent database calls.
     * 
     * @global string $serverName
     * @global string $dbUser
     * @global string $dbName
     * @global string $dbPass
     * 
     * @return boolean True if the connection was created, false otherwise.
     */
    public function connect() {
        global $serverName, $dbUser, $dbName, $dbPass;

        if (!mysql_connect($serverName, $dbUser, $dbPass)) {
            return false;
        }

        return mysql_select_db($dbName);
    }

    /**
     * Closes an existing database connection.
     */
    public function disconnect() {
        mysql_close();
    }

    /**
     *
     * @param string $criteria
     * @param string $field
     * 
     * @return integer The number of records found.
     */
    public function count($criteria = '', $field = '*') {
        $count = 0;

        $where = '';
        if ($criteria != '') {
            $where = 'WHERE ' . $criteria;
        }
        $query = sprintf("SELECT COUNT( %s ) AS 'number' FROM %s %s", $field, $this->table, $where);

        if ($this->connect()) {
            if (($resource = mysql_query($query)) && mysql_affected_rows() > 0) {
                $count = mysql_fetch_object($resource)->number;
                mysql_free_result($resource);
            }
            $this->disconnect();
        }

        return $count;
    }

    /**
     *
     * @param string $criteria
     * 
     * @return boolean True if records were removed, false otherwise 
     */
    public function delete($criteria) {
        $success = false;

        $query = sprintf("DELETE FROM %s WHERE %s LIMIT 1", $this->table, $where);
        if ($this->connect()) {
            $success = (mysql_query($query) && mysql_affected_rows());
            $this->disconnect();
        }

        return $success;
    }

    public abstract function findByPk($key, $fields = '*');

    public abstract function find($criteria = '', $fields = '*');

    public abstract function findAll($criteria = '', $fields = '*');

    public abstract function save();

    public abstract function refresh();

    public static function model() {
        
    }
}
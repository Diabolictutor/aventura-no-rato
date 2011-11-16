<?php

/* User.php
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
 * @property $userID
 * @property $email;
 * @property $password;
 * @property $name;
 * @property $group;
 * @property $signature;
 * @property $website;
 * @property $lastLogin;
 * @property $active;
 * @property $avatar;
 * @property $postPerPage;
 */
class User extends ARBase {

    public $userID;
    public $email;
    public $password;
    public $name;
    public $group;
    public $signature;
    public $website;
    public $lastLogin;
    public $active;
    public $avatar;
    public $postPerPage;

    public function __construct() {
        parent::__construct();
        
        $this->group = 1;
    }

    public function save() {
        if ($this->newRecord) {
            $insert = sprintf("
                INSERT INTO `User` (
                    `email`, 
                    `password`,
                    `name`,
                    `group`,
                    `signature`,
                    `website`,
                    `avatar`,
                    `postPerPage`) 
                VALUES ('%s', '%s', '%s', %d, '%s', '%s', '%s', %d)"
                    , $this->email, $this->password, $this->name, $this->group
                    , $this->signature, $this->website, $this->avatar, $this->postPerPage);

            if ($this->connect()) {
                if (mysql_query($insert) && mysql_affected_rows() == 1) {
                    $this->userID = mysql_insert_id();
                    $this->disconnect();
                    return true;
                }
            }
        } else {
            $update = sprintf("
                UPDATE `User` SET 
                    `email` = '%s', 
                    `password` = '%s',
                    `name` = '%s',
                    `group` = %d,
                    `signature` = '%s',
                    `website` = '%s',
                    `active` = %d,
                    `avatar` = '%s',
                    `postPerPage` = %d
                WHERE `userID` = %d"
                    , $this->email, $this->password, $this->name, $this->group
                    , $this->signature, $this->website, $this->lastLogin, $this->active
                    , $this->avatar, $this->userID
            );

            if ($this->connect()) {
                if (mysql_query($update) && mysql_affected_rows() == 1) {
                    return true;
                }
                $this->disconnect();
            }
        }

        return false;
    }

    /**
     *
     * @param type $criteria
     * @param type $fields
     * 
     * @return User 
     */
    public function find($criteria = '', $fields = '*') {

        $result = null;

        $where = '';
        if ($criteria != '') {
            $where = 'WHERE ' . $criteria;
        }
        $query = sprintf("SELECT %s FROM %s %s LIMIT 1", $fields, $this->table, $where);

        if ($this->connect()) {
            if (($resource = mysql_query($query)) && mysql_affected_rows() > 0) {
                $result = mysql_fetch_object($resource, 'User');
                mysql_free_result($resource);
            }
            $this->disconnect();
        }

        return $result;
    }

    /**
     *
     * @param type $criteria
     * @param type $fields
     * @return User[]
     */
    public function findAll($criteria = '', $fields = '*') {
        $found = array();

        $where = '';
        if ($criteria != '') {
            $where = 'WHERE ' . $criteria;
        }
        $query = sprintf("SELECT %s FROM %s %s", $fields, $this->table, $where);

        if ($this->connect()) {
            if (($resource = mysql_query($query))) {
                while (($result = mysql_fetch_object($resource, 'User')) !== null) {
                    $found[] = $result;
                }
                mysql_free_result($resource);
            }
            $this->disconnect();
        }

        return $found;
    }
    
    /**
     *
     * @param type $key
     * @param type $fields
     * @return User
     */
    public function findByPk($key, $fields = '*') {

        return $this->find('userId = ' . (int) $key);
    }

    public function refresh() {
        $temp = $this->find('userId = ' . (int) $this->userID);
        
        $this->email = $temp->email;
        $this->password = $temp->password;
        $this->name = $temp->name;
        $this->group = $temp->group;
        $this->signature = $temp->signature;
        $this->website = $temp->website;
        $this->lastLogin = $temp->lastLogin;
        $this->active = $temp->active;
        $this->avatar = $temp->avatar;
        $this->postPerPage = $temp->postPerPage;
        
    }

    /**
     *
     * @return User 
     */
    public static function model() {
        return new User();
    }

}
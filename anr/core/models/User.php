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

class User extends ARBase {

    /**
     * @var int 
     */
    public $userID;

    /**
     * @var string 
     */
    public $email;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $admin;

    /**
     * @var string 
     */
    public $signature;

    /**
     * @var string
     */
    public $website;

    /**
     * @var string
     */
    public $lastLogin;

    /**
     * @var int
     */
    public $active;

    /**
     * @var string
     */
    public $avatar;

    /**
     * @var int
     */
    public $postPerPage;

    public function __construct() {
        parent::__construct();

        $this->table = 'User';
    }

    public function save() {
        if ($this->newRecord) {
            $insert = sprintf("
                INSERT INTO `User` (
                    `email`, 
                    `password`,
                    `name`,
                    `admin`,
                    `signature`,
                    `website`,
                    `avatar`,
                    `postPerPage`) 
                VALUES ('%s', '%s', '%s', %d, '%s', '%s', '%s', %d)"
                    , $this->email, $this->password, $this->name, $this->admin
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
                    `admin` = %d,
                    `signature` = '%s',
                    `website` = '%s',
                    `active` = %d,
                    `avatar` = '%s',
                    `postPerPage` = %d
                WHERE `userID` = %d"
                    , $this->email, $this->password, $this->name, $this->admin
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
            if (($resource = mysql_query($query))) {
                $result = mysql_fetch_object($resource, 'User');
                mysql_free_result($resource);
            }
            $this->disconnect();
        }

        return $result;
    }

    /**
     *
     * @param string $criteria
     * @param string $fields
     * 
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
                ///while (($result = mysql_fetch_object($resource, 'User')) !== null) {
                //    $found[] = $result;
                //}
                mysql_free_result($resource);
            }
            $this->disconnect();
        }

        return $found;
    }

    /**
     *
     * @param int $key
     * @param string $fields
     * 
     * @return User
     */
    public function findByPk($key, $fields = '*') {

        return $this->find('userId = ' . (int) $key, $fields);
    }

    public function refresh() {
        $temp = $this->find('userId = ' . (int) $this->userID);

        $this->email = $temp->email;
        $this->password = $temp->password;
        $this->name = $temp->name;
        $this->admin = $temp->admin;
        $this->signature = $temp->signature;
        $this->website = $temp->website;
        $this->lastLogin = $temp->lastLogin;
        $this->active = $temp->active;
        $this->avatar = $temp->avatar;
        $this->postPerPage = $temp->postPerPage;
    }

    /**
     * @return User 
     */
    public static function model() {
        return new User();
    }

    /**
     * @global string $hash
     * 
     * @param string $password
     * 
     * @return string 
     */
    public static function hash($password) {
        global $hash;

        return sha1($password . $hash);
    }

}
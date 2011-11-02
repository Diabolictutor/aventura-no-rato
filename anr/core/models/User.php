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
                $this->disconnect();
                if (mysql_query($insert) && mysql_affected_rows() == 1) {
                    $this->userID = mysql_insert_id();
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

    public function find($criteria = '', $fields = '*') {
        
    }

    public function findAll($criteria = '', $fields = '*') {
        
    }

    public function findByPk($key, $fields = '*') {
        
    }

    public function refresh() {
        
    }

    /**
     *
     * @return User 
     */
    public static function model() {
        return new User();
    }

}
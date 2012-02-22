<?php

/* Character.php
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

class Character extends ARBase {

    /**
     * @var int
     */
    public $characterID;

    /**
     * @var string 
     */
    public $name;

    /**
     * @var int 
     */
    public $weight;

    /**
     * @var int 
     */
    public $strenght;

    /**
     * @var int 
     */
    public $intellect;

    /**
     * @var int 
     */
    public $luck;

    /**
     * @var int 
     */
    public $health;

    /**
     * @var int
     */
    public $userID;

    /**
     * @var int
     */
    public $level;

    /**
     * @var int 
     */
    public $defense;

    /**
     * @var int
     */
    public $active;
    
    /**
     *
     * @var int 
     */
    public $sex;

    /**
     * @var string 
     */
    public $portrait;

    //Properties that are based on model relations

    /**
     * @var User
     */
    public $owner;

    public function __construct() {
        parent::__construct();

        $this->table = 'Character';
    }

    /**
     *
     * @param string $criteria
     * @param string $fields
     * 
     * @return Character
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
                $result = mysql_fetch_object($resource, 'Character');
                $result->newRecord = false;

                $result->owner = User::model()->findByPk($result->userID);
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
     * @return Character[]
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
                while (($result = mysql_fetch_object($resource, 'Character')) !== false) {
                    $result->newRecord = false;

                    $result->owner = User::model()->findByPk($result->userID);
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
     * @param int $key
     * @param string $fields
     * 
     * @return Character 
     */
    public function findByPk($key, $fields = '*') {
        return $this->find('characterID = ' . (int) $key, $fields);
    }

    /**
     * 
     */
    public function refresh() {
        $temp = $this->find('characterID = ' . (int) $this->characterID);

        $this->characterID = $temp->characterID;
        $this->name = $temp->name;
        $this->weight = $temp->weight;
        $this->strenght = $temp->strenght;
        $this->intellect = $temp->intellect;
        $this->luck = $temp->luck;
        $this->health = $temp->health;
        $this->userID = $temp->userID;
        $this->level = $temp->level;
        $this->defense = $temp->defense;
        $this->sex = $temp->sex;
        $this->portrait = $temp->portrait;

        $this->owner = User::model()->findByPk($this->userID);
    }

    public function save() {
        if ($this->newRecord) {
            $insert = sprintf("
                INSERT INTO `Character` (
                    `name`,
                    `weight`,
                    `strenght`,
                    `intellect`,
                    `health`,
                    `userID`,
                    `level`,
                    `defense`,
                    `sex`,
                    `portrait`
                    ) 
                VALUES ('%s', %d, %d, %d, %d, %d, %d, %d, %d, '%s')"
                    , $this->name, $this->weight, $this->strenght
                    , $this->intellect, $this->luck, $this->health, $this->userID
                    , $this->level, $this->defense, $this->sex, $this->portrait);

            if ($this->connect()) {
                if (mysql_query($insert) && mysql_affected_rows() == 1) {
                    $this->characterID = mysql_insert_id();

                    $this->disconnect();
                    return true;
                }
            }
        } else {
            $update = sprintf("
                UPDATE `Character` SET 
                `name` = '%s',
                `weight` = %d,
                `strenght`= %d,
                `intellect`= %d,
                `health`= %d,
                `userID`= %d,
                `level`= %d,
                `defense`= %d,
                `sex` = %d,
                `portrait` = '%s'
                WHERE `characterID` = %d"
                    , $this->name, $this->weight, $this->strenght
                    , $this->intellect, $this->luck, $this->health, $this->userID
                    , $this->level, $this->defense, $this->sex, $this->portrait);

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
     * @return Character 
     */
    public static function model() {
        return new Character();
    }

}
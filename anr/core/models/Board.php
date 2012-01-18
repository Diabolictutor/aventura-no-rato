<?php

/* Board.php
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

class Board extends ARBase {

    /**
     * @var int
     */
    public $boardID;

    /**
     * @var string 
     */
    public $title;

    /**
     * @var int
     */
    public $position;

    //Properties that are based on model relations

    /**
     * @var Thread[] 
     */
    public $threads;

    public function __construct() {
        parent::__construct();

        $this->table = 'Board';
    }

    public function find($criteria = '', $fields = '*') {
        $result = null;

        $where = '';
        if ($criteria != '') {
            $where = 'WHERE ' . $criteria;
        }
        $query = sprintf("SELECT %s FROM %s %s LIMIT 1", $fields, $this->table, $where);

        if ($this->connect()) {
            if (($resource = mysql_query($query))) {
                $result = mysql_fetch_object($resource, 'Board');
                $result->newRecord = false;

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
     * @return Board[]
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
                while (($result = mysql_fetch_object($resource, 'Board')) !== false) {
                    $result->newRecord = false;

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
     * @return Board 
     */
    public function findByPk($key, $fields = '*') {
        return $this->find('boardID = ' . (int) $key, $fields);
    }

    /**
     * 
     */
    public function refresh() {
        $temp = $this->find('boardID = ' . (int) $this->boardID);

        $this->boardID = $temp->boardID;
        $this->title = $temp->title;
        $this->position = $temp->position;
    }

    /**
     *
     * @return boolean 
     */
    public function save() {
        if ($this->newRecord) {
            $insert = sprintf("
                INSERT INTO `Board` (
                    `title`,
                    `position`) 
                VALUES ('%s', %d)", $this->title, $this->position);

            if ($this->connect()) {

                if (mysql_query($insert) && mysql_affected_rows() == 1) {
                    $this->boardID = mysql_insert_id();

                    $this->disconnect();
                    return true;
                }
            }
        } else {
            $update = sprintf("
                UPDATE `Board` SET 
                    `title` = '%s',
                    `position` = %d
                WHERE `boardID` = %d", $this->title, $this->position, $this->boardID
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
     * @return Board 
     */
    public static function model() {
        return new Board();
    }

    /**
     *
     * @return Thread[]
     */
    public function loadThreads() {
        $this->threads = Thread::model()->findAll('boardID = ' . $this->boardID);

        return $this->threads;
    }

}


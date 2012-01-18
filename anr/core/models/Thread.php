<?php

/* Thread.php
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

class Thread extends ARBase {

    /**
     * @var int
     */
    public $threadID;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $date;

    /**
     * @var int
     */
    public $postCount;

    /**
     * @var int
     */
    public $visitCount;

    /**
     * @var int
     */
    public $authorID;

    /**
     * @var int 
     */
    public $boardID;

    //Properties that are based on model relations

    /**
     * @var User 
     */
    public $author;

    /**
     * @var Post[] 
     */
    public $posts;

    public function __construct() {
        parent::__construct();

        $this->table = 'Thread';
    }

    /**
     *
     * @param string $criteria
     * @param string $fields
     * 
     * @return Thread 
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
                $result = mysql_fetch_object($resource, 'Thread');
                $result->newRecord = false;

                $result->author = User::model()->findByPk($result->authorID);
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
     * @return Thread[]
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
                while (($result = mysql_fetch_object($resource, 'Thread')) !== false) {
                    $result->newRecord = false;

                    $result->author = User::model()->findByPk($result->authorID);
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
     * @return Thread 
     */
    public function findByPk($key, $fields = '*') {
        return $this->find('threadID = ' . (int) $key, $fields);
    }

    /**
     * 
     */
    public function refresh() {
        $temp = $this->find('threadID = ' . (int) $this->threadID);

        $this->threadID = $temp->threadID;
        $this->title = $temp->title;
        $this->date = $temp->date;
        $this->postCount = $temp->postCount;
        $this->visitCount = $temp->visitCount;
        $this->authorID = $temp->authorID;
        $this->boardID = $temp->boardID;

        $this->author = User::model()->findByPk($this->authorID);
    }

    /**
     *
     * @return boolean 
     */
    public function save() {
        if ($this->newRecord) {
            $insert = sprintf("
                INSERT INTO `Thread` (
                    `title`,
                    `date`, 
                    `postCount`,
                    `visitCount`, 
                    `authorID`, 
                    `boardID`) 
                VALUES ('%s', '%s', %d, %d, %d, %d)"
                    , $this->title, $this->date, $this->postCount
                    , $this->visitCount, $this->authorID, $this->boardID
            );

            if ($this->connect()) {

                if (mysql_query($insert) && mysql_affected_rows() == 1) {
                    $this->threadID = mysql_insert_id();
                    $this->disconnect();
                    return true;
                }
            }
        } else {
            $update = sprintf("
                UPDATE `Thread` SET 
                    `title` = '%s',
                    `date` = '%s', 
                    `postCount` = %d,
                    `visitCount` = %d, 
                    `authorID` = %d, 
                    `boardID` = %d
                WHERE `threadID` = %d"
                    , $this->title, $this->date, $this->postCount, $this->visitCount
                    , $this->authorID, $this->boardID, $this->threadID
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
     * @return Thread 
     */
    public static function model() {
        return new Thread();
    }

    /**
     *
     * @return Post[]
     */
    public function loadPosts() {
        $this->posts = Post::model()->findAll('threadID = ' . $this->threadID);

        return $this->posts;
    }

}
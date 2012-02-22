<?php

/* Post.php
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

class Post extends ARBase {

    /**
     * @var int
     */
    public $postID;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $created;

    /**
     * @var string
     */
    public $modified;

    /**
     * @var int 
     */
    public $authorID;

    /**
     * @var int
     */
    public $modifiedBy;

    /**
     * @var string 
     */
    public $active;
    
    /**
     *
     * @var int 
     */
    public $post;

    /**
     * @var int 
     */
    public $threadID;

    //Properties that are base on model relations

    /**
     * @var User 
     */
    public $author;

    /**
     * @var User 
     */
    public $modifier;

    public function __construct() {
        parent::__construct();

        $this->table = 'Post';
    }

    /**
     *
     * @param string $criteria
     * @param string $fields
     * 
     * @return Post
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
                $result = mysql_fetch_object($resource, 'Post');
                $result->newRecord = false;

                $result->author = User::model()->findByPk($result->authorID);
                if ($result->modifiedBy) {
                    $result->modifier = User::model()->findByPk($result->modifiedBy);
                }

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
     * @return Post[]
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
                while (($result = mysql_fetch_object($resource, 'Post')) !== false) {
                    $result->newRecord = false;

                    $result->author = User::model()->findByPk($result->authorID);
                    if ($result->modifiedBy) {
                        $result->modifier = User::model()->findByPk($result->modifiedBy);
                    }
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
     * @param striing $fields
     * 
     * @return Post
     */
    public function findByPk($key, $fields = '*') {
        return $this->find('postID = ' . (int) $key, $fields);
    }

    /**
     * 
     */
    public function refresh() {
        $temp = $this->find('postID = ' . (int) $this->postID);

        $this->postID = $temp->postID;
        $this->title = $temp->title;
        $this->created = $temp->created;
        $this->modified = $temp->modified;
        $this->authorID = $temp->authorID;
        $this->modifiedBy = $temp->modifiedBy;
        $this->post = $temp->post;
        $this->threadID = $temp->threadID;
        //
        $this->author = User::model()->findByPk($this->authorID);
        if ($this->modifiedBy) {
            $this->modifier = User::model()->findByPk($this->modifiedBy);
        }
    }

    /**
     *
     * @return boolean 
     */
    public function save() {
        if ($this->newRecord) {
            $insert = sprintf("
                INSERT INTO `Post` (
                    `title`,
                    `created`,
                    `authorID`,
                    `post`,
                    `threadID`
                    ) 
                VALUES ('%s', '%s', %d, '%s', %d)"
                    , $this->title, $this->created, $this->authorID, $this->post, $this->threadID);

            if ($this->connect()) {

                if (mysql_query($insert) && mysql_affected_rows() == 1) {
                    $this->postID = mysql_insert_id();
                    $this->disconnect();
                    return true;
                }
            }
        } else {
            $update = sprintf("
                UPDATE `Post` SET 
                    `title` = '%s',
                    `created` = '%s',
                    `modified` = '%s',
                    `authorID` = %d,
                    `modifiedBy` = %d,
                    `post` = '%s',
                    `threadID` = %d
                WHERE `postID` = %d"
                    , $this->title, $this->created, $this->modified, $this->authorID
                    , $this->modifiedBy, $this->post, $this->threadID, $this->postID
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
     * @return Post 
     */
    public static function model() {
        return new Post();
    }

}


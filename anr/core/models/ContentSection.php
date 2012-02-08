<?php

/* ContentSection.php
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

class ContentSection extends ARBase {

    /**
     * @var int
     */
    public $contentID;

    /**
     * @var string
     */
    public $date;

    /**
     * @var string 
     */
    public $description;

    /**
     * @var string 
     */
    public $content;

    public function __construct() {
        parent::__construct();

        $this->table = 'ContentSection';
    }

    /**
     *
     * @return boolean 
     */
    public function save() {
        if ($this->newRecord) {
            $insert = sprintf("
                INSERT INTO `ContentSection` (
                    `date`,
                    `description`,
                    `content`
                    )
                VALUES ('%s', '%s', '%s')"
                    , $this->date, $this->description, $this->content);

            if ($this->connect()) {
                if (mysql_query($insert) && mysql_affected_rows() == 1) {
                    $this->contentID = mysql_insert_id();

                    return true;
                }
                $this->disconnect();
            }
        } else {
            $update = sprintf("
                UPDATE `ContentSection` SET 
                    `date` = '%d',
                    `description` = '%s',
                    `content` = '%s',
                WHERE `contentID` = %s"
                    , $this->date, $this->description, $this->content, $this->contentID);
        }
    }

    /**
     *
     * @param string $criteria
     * @param string $fields
     * 
     * @return ContentSection
     */
    public function find($criteria = '', $fields = '*') {
        $found = null;

        $where = '';
        if ($criteria != '') {
            $where = ' WHERE ' . $criteria;
        }
        $query = sprintf("SELECT %s FROM %s %s", $fields, $this->table, $where);

        if ($this->connect()) {
            if (($resource = mysql_query($query))) {
                if (($result = mysql_fetch_object($resource, 'ContentSection')) !== false) {
                    $found = $result;
                }
                mysql_free_result($resource);
            }
            $this->disconnect();
        }
        return $found;
    }

    /**
     *
     * @param string $criteria
     * @param string $fields
     * 
     * @return ContentSection[]
     */
    public function findAll($criteria = '', $fields = '*') {
        $found = array();

        $where = '';
        if ($criteria != '') {
            $where = ' WHERE ' . $criteria;
        }
        $query = sprintf("SELECT %s FROM %s %s", $fields, $this->table, $where);

        if ($this->connect()) {
            if (($resource = mysql_query($query))) {
                while (($result = mysql_fetch_object($resource, 'ContentSection')) !== false) {
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
     * @return ContentSection 
     */
    public function findByPk($key, $fields = '*') {
        return $this->find('contentID = ' . (int) $key, $fields);
    }

    /**
     * 
     */
    public function refresh() {
        $temp = $this->findByPk($this->contentID);

        $this->date = $temp->date;
        $this->description = $temp->description;
        $this->content = $temp->content;
    }

    /**
     *
     * @return ContentSection 
     */
    public static function model() {
        return new ContentSection();
    }

}
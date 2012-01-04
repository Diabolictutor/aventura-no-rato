<?php

/**
 * property $boardID;
 * property  $title;
 * property  $position;
 */
class Board extends ARBase {

    public $boardID;
    public $title;
    public $position;

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
     * @param type $criteria
     * @param type $fields
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

    public function findByPk($key, $fields = '*') {
        return $this->find('boardID = ' . (int) $key);
    }

    public function refresh() {
        $temp = $this->find('boardID = ' . (int) $this->boardID);

        $this->boardID = $temp->boardID;
        $this->title = $temp->title;
        $this->position = $temp->position;
    }

    public function save() {
        if ($this->newRecord) {
            $insert = sprintf("
                INSERT INTO `Board` (
                    `boardID`, 
                    `title`,
                    `position`) 
                VALUES (%d, '%s', %d)"
                    , $this->boardID, $this->title, $this->position);

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
                    `boardID` = %d, 
                    `title` = '%s',
                    `position` = %d
                WHERE `boardID` = %d"
                    , $this->boardID, $this->title, $this->position, $this->boardID
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

    public static function model() {
        return new Board();
    }

    public function loadThreads() {
        return Thread::model()->findAll('boardID = ' . $this->boardID);
    }

}


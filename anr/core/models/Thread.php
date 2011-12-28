<?php

/**
 * property $threadID;
 * property $title;
 * property $position;
 */
class Thread extends ARBase {

    public $threadID;
    public $title;
    public $date;
    public $postCount;
    public $visitCount;
    public $authorID;
    public $boardID;
    public $author;
    
    public function __construct() {
        parent::__construct();
        
        $this->table = 'Thread';
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
                $result = mysql_fetch_object($resource, 'Thread');
                $result->newRecord = false;
                $result->author = User::model()->findByPk($result->authorID)->name;
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
                    $result->author = User::model()->findByPk($result->authorID)->name;
                    $found[] = $result;
                }
                mysql_free_result($resource);
            }

            $this->disconnect();
        }

        return $found;
    }

    public function findByPk($key, $fields = '*') {
        return $this->find('threadID = ' . (int) $key);
    }

    public function refresh() {
        $temp = $this->find('threadID = ' . (int) $this->threadID);

        $this->threadID = $temp->threadID;
        $this->title = $temp->title;
        $this->date = $temp->date;
        $this->postCount = $temp->postCount;
        $this->visitCount = $temp->visitCount;
        $this->authorID = $temp->authorID;
        $this->boardID = $temp->boardID;
        $this->author = User::model()->findByPk($this->authorID)->name;
    }

    public function save() {
        if ($this->newRecord) {
            $insert = sprintf("
                INSERT INTO `Thread` (
                    `threadID`, 
                    `title`,
                    `date`, 
                    `postCount`,
                    `visitCount`, 
                    `authorID`, 
                    `boardID`) 
                VALUES (%d, '%s', %d)"
                    , $this->threadID, $this->title, $this->date, $this->postCount, $this->visitCount, $this->authorID, $this->boardID);

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
                    `threadID` = %d, 
                    `title` = '%s',
                    `date` = '%s', 
                    `postCount` = %d,
                    `visitCount` = %d, 
                    `authorID` = %d, 
                    `boardID` = %d
                WHERE `threadID` = %d"
                    , $this->threadID, $this->title, $this->date, $this->postCount, $this->visitCount, $this->authorID, $this->boardID
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
        return new Thread();
    }
    
    public function loadPosts() {
        return Post::model()->findAll('threadID = ' . $this->threadID);
    }

}
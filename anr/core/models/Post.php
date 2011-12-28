<?php

/**
 * property $postID;
 * property  $title;
 * property  $position;
 */
class Post extends ARBase {

    public $postID;
    public $post;
    public $title;
    public $date;
    public $postCount;
    public $visitCount;
    public $authorID;
    public $threadID;
    public $author;

    public function __construct() {
        parent::__construct();

        $this->table = 'Post';
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
                $result = mysql_fetch_object($resource, 'Post');
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
        return $this->find('postID = ' . (int) $key);
    }

    public function refresh() {
        $temp = $this->find('postID = ' . (int) $this->postID);

        $this->postID = $temp->postID;
        $this->post = $temp->post;
        $this->title = $temp->title;
        $this->date = $temp->date;
        $this->postCount = $temp->postCount;
        $this->visitCount = $temp->visitCount;
        $this->authorID = $temp->authorID;
        $this->threadID = $temp->threadID;
        $this->author = User::model()->findByPk($this->authorID)->name;
    }

    public function save() {
        if ($this->newRecord) {
            $insert = sprintf("
                INSERT INTO `Post` (
                    `postID`,
                    `post`,
                    `title`,
                    `date`, 
                    `postCount`,
                    `visitCount`, 
                    `authorID`, 
                    `threadID`) 
                VALUES (%d, '%s', '%s', 's', %d, %d, %d, %d)"
                    , $this->postID, $this->post, $this->title, $this->date, $this->postCount, $this->visitCount, $this->authorID, $this->threadID);

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
                    `postID` = %d,
                    `post` = '%s',
                    `title` = '%s',
                    `date` = '%s', 
                    `postCount` = %d,
                    `visitCount` = %d, 
                    `authorID` = '%s', 
                    `threadID` = %d
                WHERE `postID` = %d"
                    , $this->postID, $this->post, $this->title, $this->date, $this->postCount, $this->visitCount, $this->authorID, $this->threadID
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
        return new Post();
    }

}


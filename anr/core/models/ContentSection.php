<?php

class ContentSection extends ARBase {

    public $ContentID;
    public $date;
    public $description;
    public $content;

    public function __construct() {
        parent::__construct();

        $this->table = 'ContentSection';
    }

    public function save() {
        if ($this->newRecord) {
            $insert = sprintf("
                INSERT INTO `ContentSection` (
                    `ContentID`, 
                    `date`,
                    `description`,
                    `content`)
                VALUES ('%d', '%d', '%s', '%s')"
                    , $this->ContentID, $this->date, $this->description, $this->content);

            if ($this->connect()) {
                if (mysql_query($insert) && mysql_affected_rows() == 1) {
                    $this->userID = mysql_insert_id();
                    return true;
                }$this->disconnect();
            }
        } else {
            $update = sprintf("
                UPDATE `ContentSection` SET 
                    `ContentID` = '%s', 
                    `date` = '%d',
                    `description` = '%s',
                    `content` = '%s',
                WHERE `ContentSectionID` = %s"
                    , $this->ContentID, $this->date, $this->description, $this->content);
        }
    }

    public function find($criteria = '', $fields = '*') {
        
    }

    public function findAll($criteria = '', $fields = '*') {
        $found = array();

        $where = '';
        if ($criteria != '') {
            $where = 'WHERE ' . $criteria;
        }
        $query = sprintf("SELECT %s FROM %s %s", $fields, $this->table, $where);

        if ($this->connect()) {
            if (($resource = mysql_query($query))) {
                while (($result = mysql_fetch_object($resource, 'User')) !== null) {
                    $found[] = $result;
                }
                mysql_free_result($resource);
            }
            $this->disconnect();
        }

        return $found;
    }

    public function findByPk($key, $fields = '*') {
        
    }

    public function refresh() {
        
    }

    public static function model() {
        return new ContentSection();
    }

}
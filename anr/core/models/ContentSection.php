<?php

class ContentSection extends ARBase {

    public $contentID;
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
                    , $this->contentID, $this->date, $this->description, $this->content);

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
                    , $this->contentID, $this->date, $this->description, $this->content);
        }
    }

    public function find($criteria = '', $fields = '*') {
        $found;

        $where = '';
        if ($criteria != '') {
            $where = ' WHERE ' . $criteria;
        }
        $query = sprintf("SELECT %s FROM %s %s", $field, $this->table, $where);

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

    public function findByPk($key, $fields = '*') {
        return $this->find('contentID = ' . (int) $key);
    }

    public function refresh() {
        $temp = $this->findByPk($this->contentID);
        $this->date = $temp->date;

        $temp = $this->findByPk($this->contentID);
        $this->description = $temp->description;

        $temp = $this->findByPk($this->contentID);
        $this->content = $temp->content;
    }

    public static function model() {
        return new ContentSection();
    }

}
<?php

class cms extends ARBase {

    public $ContentID;
    public $date;
    public $description;
    public $content;

    public function __construct() {
        parent::__construct();
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

}
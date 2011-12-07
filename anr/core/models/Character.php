<?php

/**
 * property $characterID;
 * property $name;
 * property $level;
 * property $weight;
 * property $strenght;
 * property $defense;
 * property $intellect;
 * property $health;
 * property $userID;
 * property $luck;
 */
class Character extends ARBase {

    public $characterID;
    public $name;
    public $weight;
    public $strenght;
    public $intellect;
    public $luck;
    public $health;
    public $userID;
    public $level;
    public $defense;

    public function __construct() {
        parent::__construct();

        $this->table = 'Character';
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
                $result = mysql_fetch_object($resource, 'Character');
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
     * @return Character[]
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
                while (($result = mysql_fetch_object($resource, 'Character')) !== false) {
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
        return $this->find('characterID = ' . (int) $key);
    }

    public function refresh() {
        $temp = $this->find('characterID = ' . (int) $this->characterID);

        $this->characterID = $temp->characterID;
        $this->name = $temp->name;
        $this->weight = $temp->weight;
        $this->strenght = $temp->strenght;
        $this->intellect = $temp->intellect;
        $this->luck = $temp->luck;
        $this->health = $temp->health;
        $this->userID = $temp->userID;
        $this->level = $temp->level;
        $this->defense = $temp->defense;
    }

    public function save() {
        if ($this->newRecord) {
            $insert = sprintf("
                INSERT INTO `Character` (
                    `characterID`, 
                    `name`,
                    `weight`,
                     `strenght`,
                      `intellect`,
                       `health`,
                        `userID`,
                        `level`,
                        `defense`) 
                VALUES (%d, '%s', %d, %d, %d, %d, %d, %d, %d)"
                    , $this->characterID, $this->name, $this->weight, $this->strenght
                    , $this->intellect, $this->luck, $this->health, $this->userID
                    , $this->level, $this->defense);

            if ($this->connect()) {

                if (mysql_query($insert) && mysql_affected_rows() == 1) {
                    $this->characterID = mysql_insert_id();
                    $this->disconnect();
                    return true;
                }
            }
        } else {
            $update = sprintf("
                UPDATE `Character` SET 
                `characterID` = %d, 
                `name` = '%s',
                `weight` = %d,
                `strenght`= %d,
                `intellect`= %d,
                `health`= %d,
                 `userID`= %d,
                `level`= %d,
                 `defense`= %d
                WHERE `characterID` = %d"
                    , $this->characterID, $this->name, $this->weight, $this->strenght
                    , $this->intellect, $this->luck, $this->health, $this->userID
                    , $this->level, $this->defense);
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
        return new Character();
    }

}
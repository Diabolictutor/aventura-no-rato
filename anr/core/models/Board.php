<?php

class Board extends ARBase {

    public $boardID;
    public $title;
    public $position;

    public function __construct() {
        parent::__construct();
    }

    public function find($criteria = '', $fields = '*') {
        
    }

    public function findAll($criteria = '', $fields = '*') {
        
    }

    public function findByPk($key, $fields = '*') {
        
    }

    public function refresh() {
        
    }

    public function save() {
        
    }

    public static function model() {
        return new Board();
    }

}

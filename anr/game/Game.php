<?php

class Game extends Controller {

    public function __construct() {
        parent::__construct('game');
    }

    public function index() {
        echo 'no metodo index do game';
    }

}
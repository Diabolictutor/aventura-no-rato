<?php

class Forum extends Controller {

    public function __construct() {
        parent::__construct('forum');
    }
    
    public function index() {
   //     $this->render('index');
        echo 'No metodo index do forum';
    }

}


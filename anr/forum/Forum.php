<?php

class Forum extends Controller {

    public function __construct() {
        parent::__construct('forum');
    }

    public function index() {
        $this->render('forum/index');
    }

}


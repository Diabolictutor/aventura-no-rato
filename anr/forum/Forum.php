<?php

class Forum extends Controller {

    public function __construct() {
        parent::__construct('forum');
    }

    public function index() {
        $this->render('forum/index');
    }

    public function search() {
        $this->render('forum/search');
    }

    public function searchResults() {
        $this->render('forum/search-results');
    }

}


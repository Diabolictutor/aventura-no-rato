<?php

class Login extends Controller {

    public function __construct() {
        parent::__construct('site');
    }

    public function index() {
        $this->render('site/login');
    }

}

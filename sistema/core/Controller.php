<?php

abstract class Controller {

    private $view;

    public function __construct($layout = 'site') {
        $this->view = new View($this, $layout);
    }

    public function render($view, $data = array(), $return = false) {
        $this->view->render($view, $data, $return);
    }

    public function getView() {
        return $this->view;
    }

}

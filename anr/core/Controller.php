<?php

/**
 * 
 */
abstract class Controller {

    private $view;

    public function __construct($layout = 'site') {
        $this->view = new View($this, $layout);
    }

    /**
     *
     * @param View $view
     * @param array $data
     * @param boolean $return 
     * 
     * @see View::render()
     */
    public function render($view, $data = array(), $return = false) {
        $this->view->render($view, $data, $return);
    }

    /**
     *
     * @return View 
     */
    public function getView() {
        return $this->view;
    }

}

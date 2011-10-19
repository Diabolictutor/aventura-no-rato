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
     * @param type $view
     * @param type $data
     * @param type $return 
     * 
     * @see View::render()
     */
    public function render($view, $data = array(), $return = false) {
        $this->view->render($view, $data, $return);
    }

    /**
     *
     * @return type 
     */
    public function getView() {
        return $this->view;
    }

}

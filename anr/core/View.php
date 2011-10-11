<?php

class View {

    public static $POS_INIT = 1;
    public static $POS_HEAD = 2;
    public static $POS_END = 3;
    //
    private $layout;
    private $scripts;
    private $styles;
    private $jsInit;
    private $jsEnd;
    private $data;
    private $parcials;
    private $controller;

    public function __construct($controller, $layout = 'site') {
        $this->controller = $controller;
        $this->layout = $layout;
        $this->scripts = array();
        $this->styles = array();
        $this->jsInit = array();
        $this->jsEnd = array();
        $this->data = array();
        $this->parcials = array();
    }

    public function __get($name) {
        return (isset($this->data[$name]) ? $this->data[$name] : null);
    }

    public function createURL($path, $params = array()) {
        //TODO: devolver um URL completo para o controlador/método e parâmetros passados
    }

    public function includeTemplateFile($name) {
        $name = VIEWROOT . '/' . $name . '.php';
        if (is_file($name))
            include $name;
    }

    public function registerScript($script, $pos = 2) {
        //TODO: colocar o script indicado na variável adequada
        //implementar sistema de prioridade, !
    }

    public function registerStyle($style) {
        //TODO: registar o ficheiro CSS, implementar sistema de prioridade, !
    }

    public function getStyleSection() {
        ob_start();
        //TODO: criar o HTML necessário para colocar todos os ficheiros CSS no 
        //header da página.
        return ob_get_clean();
    }

    public function getScriptSection() {
        ob_start();
        //TODO: criar HTML necessário para colocar todos os ficheiros JS no 
        //header da página
        return ob_get_clean();
    }

    public function getInitScriptSection() {
        ob_start();
        //TODO: criar o HTML necessário para colocar todo o código de iniciação 
        //dentro da função jQuery
        return ob_get_clean();
    }

    public function getEndScriptSection() {
        ob_start();
        //TODO: criar o HTML necessário para colocar todo o código de iniciação 
        //no fim da página
        return ob_get_clean();
    }

    public function getContentSection() {
        ob_start();
        foreach ($this->parcials as $parcial) {
            echo $parcial;
        }

        return ob_get_clean();
    }

    public function render($view, $data = array(), $return = false) {
        if (empty($view)) {
            throw new Exception('Invalid view.');
        }

        if (is_object($data)) {
            $data = get_object_vars($data);
        } else if (!is_array($data)) {
            $data = array($data => $data);
        }
        $this->data = array_merge($this->data, $data);

        $file = VIEWROOT . '/' . $view . '.php';
        ob_start();
        if (is_file($file)) {
            include $file;
        } else if (is_file($view)) {
            include $view;
        }

        if ($return) {
            return ob_get_clean();
        }
        $this->parcials[] = ob_get_clean();
        $this->output();
    }

    private function output() {
        $path = VIEWROOT . '/layouts/' . $this->layout . '.php';
        if (is_file($path)) {
            ob_start();
            include $path;
            echo ob_get_clean();
        }
    }

}

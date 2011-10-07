<?php

class Sistema {

    private $url;

    public function __construct() {
        $this->url = self::findURL();
    }

    public function execute() {
        $this->route();

        //TODO: instanciar
        //if ($this->method != '') {
        //    $method = $this->method;
        //}
        //if (!empty($this->params)) {
        //    $this->controller->$method($this->params);
        //} else {
        //    $this->controller->$method();
        //}
    }

    private function route() {
        //TODO: implementar escolha
    }

    public static function app() {
        global $app;

        return $app;
    }

    public static function findURL($includeFilename = false) {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $protocol = 'https';
        } else {
            $protocol = 'http';
        }

        $port = '';
        if (isset($_SERVER['SERVER_PORT'])) {
            if (($protocol == 'http' && $_SERVER['SERVER_PORT'] != 80) || ($protocol == 'https' && $_SERVER['SERVER_PORT'] != 443)) {
                $port = ":{$_SERVER['SERVER_PORT']}";
            }
        }

        $server_name = isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '';
        $php_self = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : '';
        $php_self = substr($php_self, 0, strpos($php_self, 'index.php'));
        if ($includeFilename) {
            return $protocol . '://' . $_SERVER['SERVER_NAME'] . $port . $php_self;
        }

        $self = explode('/', $php_self);
        $last = array_keys($self);
        $last = end($last);
        unset($self[$last]);
        $self = implode('/', $self);

        return $protocol . '://' . $server_name . $port . $self . '/';
    }

    public function getURL() {
        return $this->url;
    }

}
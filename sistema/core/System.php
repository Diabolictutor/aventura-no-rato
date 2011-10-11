<?php

class System {

    private $url;
    private $controller;
    private $action;

    public function __construct() {
        $this->url = self::findURL();
    }

    public function execute() {
        $this->route();

        $c = $this->controller;
        $a = $this->action;

        $this->controller = new $c();
        $this->controller->$a();
    }

    private function route() {
        //r - route; c - controller; a - action;

        $this->controller = 'Site';
        $this->action = 'index';
        if (!isset($_GET['r']) && !isset($_GET['c'])) {
            return;
        }

        if (!isset($_GET['r']) && isset($_GET['c']) && class_exists($_GET['c'])) {
            $this->controller = $_GET['c'];
            $action = isset($_GET['a']) ? $_GET['a'] : 'index';

            return;
        }

        if (isset($_GET['r']) && $_GET['r'] !== 'forum' && $_GET['r'] !== 'game') {
            $this->controller = 'Error';
            $this->action = 'index';

            return;
        }

        if (isset($_GET['r'])) {
            $this->controller = isset($_GET['c']) && class_exists($_GET['c']) ? $_GET['c'] : ucfirst($_GET['r']);
        }
        $action = isset($_GET['a']) && method_exists($this->controller, $_GET['a']) ? $_GET['a'] : 'index';

        unset($_GET['r'], $_GET['c'], $_GET['a']);
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
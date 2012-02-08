<?php

/* System.php
 * 
 * This file is part of Aventura no Rato! A browser based, adventure type, game.
 * Copyright (C) 2011  Diogo Samuel, Jorge Gonçalves, Pedro Pires e Sérgio Lopes
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>. 
 */

class System {

    private $url;
    private $controller;
    private $action;

    public function __construct() {
        $this->url = self::findURL();
    }

    /**
     * 
     */
    public function execute() {
        $this->route();

        $c = $this->controller;
        $a = $this->action;

        $this->controller = new $c();
        $this->controller->$a();
    }

    /**
     * 
     */
    private function route() {
        //r - route; c - controller; a - action;

        $this->controller = 'Site';
        $this->action = 'index';
        if (!isset($_GET['r']) && !isset($_GET['c'])) {
            return;
        }

        if (!isset($_GET['r']) && isset($_GET['c']) && class_exists($_GET['c'])) {
            $this->controller = $_GET['c'];
            $this->action = isset($_GET['a']) ? $_GET['a'] : 'index';

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
        $this->action = isset($_GET['a']) && method_exists($this->controller, $_GET['a']) ? $_GET['a'] : 'index';

        unset($_GET['r'], $_GET['c'], $_GET['a']);
    }

    /**
     *
     * @global System $app The application created in the <em>index.php</em> file.
     * 
     * @return System The application running the request.
     */
    public static function app() {
        global $app;

        return $app;
    }

    /**
     * Determines the correct URL used by the system.
     * 
     * @param boolean $includeFilename if the script name should be part of the URL.
     * @return string The URL.
     */
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

    /**
     * Returns the site URL.
     * 
     * @return string The full site URL.
     */
    public function getURL() {
        return $this->url;
    }

    /**
     *
     * @return stdClass 
     */
    public function getUser() {
        return $_SESSION['user'];
    }

    public function authenticateUser(User $user) {
        $_SESSION['user'] = (object) array(
                    'id' => $user->userID,
                    'name' => $user->name,
                    'admin' => $user->admin
        );
    }

    public function clearUser() {
        unset($_SESSION['user']);
    }

    /**
     *
     * @return boolean
     */
    public function isGuest() {
        return !isset($_SESSION['user']);
    }

    public function isAdmin() {
        return (isset($_SESSION['user']) && intval($_SESSION['user']->admin) === 1);
    }

}
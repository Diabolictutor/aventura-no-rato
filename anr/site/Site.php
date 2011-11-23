<?php

/* Site.php
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

class Site extends Controller {

    public function __construct() {
        parent::__construct('site');
    }

    public function index() {
        $this->render('site/home');
    }

    public function statsSummary() {
        $this->render('site/statistics-summary');
    }

    public function login() {

        $error = array();
               
        if (isset($_POST['register'])) {
            if (!isset($_POST['email']) || !isset($_POST['name']) || !isset($_POST['password']) || !isset($_POST['password2'])) {
                $error[] = 'Fill all the fields. Missing fields:';
                if (!isset($_POST['email'])) {
                    $error[] = 'Email';
                }
                if (!isset($_POST['name'])) {
                    $error[] = 'Name';
                }
                if (!isset($_POST['password'])) {
                    $error[] = 'Password';
                }
                if (!isset($_POST['password2'])) {
                    $error[] = 'Password Confirmation';
                }
            } else {
                $pass1 = $_POST['password'];
                $pass2 = $_POST['password2'];
                if ($pass1 !== $pass2) {
                    $error[] = 'Password confirmation failed';
                } else {
                    $user = new User();

                    $user->email = $_POST['email'];
                    $user->password = $pass1;
                    $user->name = $_POST['name'];

                    $user->save();
                }
            }
        } else if (isset($_POST['login'])) {              
            if (!isset($_POST['email']) || !isset($_POST['name']) || !isset($_POST['password'])) {
                $error[] = 'Fill all the fields. Missing fields:';
                if (!isset($_POST['email'])) {
                    $error[] = 'Email';
                    if (!isset($_POST['password'])) {
                        $error[] = 'Password';
                    }
                } else {
                    $pass = $_POST['password'];
                    $email = $_POST['email'];
                    $user = User::model()->find(sprintf("email = '%s'", $email));
                    
                    if ($user == NULL) {
                        $error[] = 'Wrong Username';
                    } else if ($pass !== $user->password) {
                        $error[] = 'Wrong Password';
                    } else {
                        header('Location: http://localhost/public/aventura_no_rato/www/');
                        exit;
                    }
                }
            }
        }


        $this->render('site/login', array('error' => $error));
    }

}

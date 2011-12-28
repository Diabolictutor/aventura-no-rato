<?php

/* Administration.php
 * 
 * This file is part of Aventura no Rato! A browser based, adventure type, game.
 * Copyright (C) 2011  Diogo Alexandre, Jorge Gonçalves, Pedro Pires e Sérgio Lopes
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

class Administration extends Controller {

    public function __construct() {
        parent::__construct('administration');

        //if (!System::app()->isAdmin()){
        //    $this->redirect(array());
        ////}
    }

    public function index() {
        $boards = Board::model()->findAll();
        $this->render('administration/boards', array(
            'boards' => $boards,
            'selection' => 'boards'
        ));
    }

    public function cms() {
        $csections = ContentSection::model()->findAll();
        $this->render('administration/cms', array(
            'csections' => $csections,
            'selection' => 'cms'
        ));
    }

    public function editBoard() {
        $board = new Board();
        
        if (isset($_GET['id']) && intval($_GET['id']) != 0) {
            $board = Board::model()->findByPk($_GET['id']);
        }

        if (isset($_POST['Board'])) {
            $board->title = $_POST['title'];
            $board->position = $_POST['position'];

            if ($board->save()) {
                $this->redirect(array('c' => 'administration', 'a' => 'editboard'), array('id' => $board->boardID));
            }
        }
        $this->render('administration/edit-board', array('board' => $board));
    }

    public function editUser() {
        $user = new User();
        
        if (isset($_GET['id']) && intval($_GET['id']) != 0) {
            $user = User::model()->findByPk($_GET['id']);
        }

        if (isset($_POST['User'])) {
            $user->name = $_POST['name'];
            $user->password = $_POST['password'];
            $user->group = $_POST['group'];
            $user->active = $_POST['active'];

            if ($user->save()) {
                $this->redirect(array('c' => 'administration', 'a' => 'edituser'), array('id' => $board->userID));
            }
        }
        $this->render('administration/edit-user', array('user' => $user));
    }

    public function editChar() {
        $Character = new Character();
        
        if (isset($_GET['id']) && intval($_GET['id']) != 0) {
            $user = User::model()->findByPk($_GET['id']);
        }
        $this->render('administration/edit-char', array('character' => $character));
    }
    
    public function users() {
        $users = User::model()->findAll();
        $this->render('administration/users', array(
            'lUsers' => $users,
            'selection' => 'users'
        ));
    }
    
    public function chars() {
        $chars = Character::model()->findAll();
        $this->render('administration/cms', array(
            'lChars' => $chars,
            'selection' => 'chars'
        ));
    }
}
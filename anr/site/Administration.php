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

        if (!System::app()->isAdmin()) {
            $this->redirect(array());
        }
    }

    public function index() {
        $boards = Board::model()->findAll();

        $this->render('administration/boards', array(
            'boards' => $boards,
            'selection' => 'boards'
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

    public function cms() {
        $csections = ContentSection::model()->findAll();

        $this->render('administration/cms', array(
            'csections' => $csections,
            'selection' => 'cms'
        ));
    }

    public function editContent() {
        $content = new ContentSection();

        if (isset($_GET['id']) && intval($_GET['id'])) {
            $content = ContentSection::model()->findByPk($_GET['id']);
        }

        if (isset($_POST['ContentSection'])) {
            $content->description = $_POST['description'];
            $content->content = $_POST['content'];
        }

        $this->render('administration/edit-content', array('content' => $content));
    }

    public function users() {
        $users = User::model()->findAll();

        $this->render('administration/users', array(
            'users' => $users,
            'selection' => 'users'
        ));
    }

    public function editUser() {
        $user = new User();

        if (isset($_GET['id']) && intval($_GET['id']) != 0) {
            $user = User::model()->findByPk($_GET['id']);
        }

        if (isset($_POST['User'])) {
            $user->name = $_POST['name'];
            $user->password = User::hash($_POST['password']);

            $user->group = intval($_POST['group']);
            $user->active = intval($_POST['active']);

            if ($user->save()) {
                $this->redirect(array('c' => 'administration', 'a' => 'edituser'), array('id' => $user->userID));
            }
        }
        $this->render('administration/edit-user', array('user' => $user));
    }

    public function chars() {
        $chars = Character::model()->findAll();
        $this->render('administration/cms', array(
            'lChars' => $chars,
            'selection' => 'chars'
        ));
    }

    public function editChar() {
        $character = new Character();

        if (isset($_GET['id']) && intval($_GET['id']) != 0) {
            $character = Character::model()->findByPk($_GET['id']);
        }

        if (isset($_POST['Character'])) {
            $character->defense = intval($_POST['Character']);
            $character->health = intval($_POST['Character']);
            $character->intellect = intval($_POST['Character']);
            $character->level = intval($_POST['Character']);
            $character->luck = intval($_POST['Character']);
            $character->name = $_POST['Character'];
            $character->portrait = $_POST['Character'];
            $character->sex = intval($_POST['Character']);
            $character->strenght = intval($_POST['Character']);
            $character->userID = intval($_POST['Character']);
            $character->weight = intval($_POST['Character']);

            if ($character->save()) {
                $this->redirect(array('c' => 'administration', 'a' => 'editchar'), array('id' => $character->characterID));
            }
        }
        $this->render('administration/edit-char', array('character' => $character));
    }

}

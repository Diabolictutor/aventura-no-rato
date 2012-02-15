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
            $postData = $_POST['Board'];

            $board->title = $postData['title'];
            $board->position = $postData['position'];

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
            $postCont = $_POST['content'];
            
            $content->description = $postCont['description'];
            $content->content = $postCont['content'];
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
            $postUser = $_POST['user'];
            
            $user->name = $postUser['name'];
            $user->password = User::hash($postUser['password']);

            $user->group = intval($postUser['group']);
            $user->active = intval($postUser['active']);

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
            $postChar = $_POST['character'];
            
            $character->defense = intval($postChar['Character']);
            $character->health = intval($postChar['Character']);
            $character->intellect = intval($postChar['Character']);
            $character->level = intval($postChar['Character']);
            $character->luck = intval($postChar['Character']);
            $character->name = $postChar['Character'];
            $character->portrait = $postChar['Character'];
            $character->sex = intval($postChar['Character']);
            $character->strenght = intval($postChar['Character']);
            $character->userID = intval($postChar['Character']);
            $character->weight = intval($postChar['Character']);

            if ($character->save()) {
                $this->redirect(array('c' => 'administration', 'a' => 'editchar'), array('id' => $character->characterID));
            }
        }
        $this->render('administration/edit-char', array('character' => $character));
    }

}

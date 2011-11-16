<?php

/* Administration.php
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

class Administration extends Controller {

    public function __construct() {
        parent::__construct('administration');
    }

    public function index() {
        $this->render('administration/index');
    }

    public function forum() {
        $this->render('administration/forum', array(
            'boards' => Board::model()->findAll()
        ));
    }

    public function cms() {
        $this->render('administration/cms');
    }

    public function layoutEdit() {
        $this->render('administration/layout-edit');
    }

    public function editBoard() {
        if (isset($_GET['id']) && intval($_GET['id']) != 0) {
            $board = Board::model()->findByPk($_GET['id']);
        } else {
            $board = new Board();
        }

        if ($_POST['Board']) {
            $board->title = $_POST['title'];
            $board->position = $_POST['position'];

            if ($board->save()) {
                //TODO: redirect code...
            }
        }

        $this->render('administration/edit-board', array('board' => $board));
    }

    public function listBoard() {
        $boards = Board::model()->findAll();

        $this->render('administration/forum', array('boards' => $boards));
    }

    public function editTopic() {
        
    }

}
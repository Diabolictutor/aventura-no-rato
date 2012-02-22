<?php

/* Forum.php
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

class Forum extends Controller {

    public function __construct() {
        parent::__construct('forum');
    }

    /**
     * Forum root
     */
    public function index() {
        $boards = Board::model()->findAll();
        $this->render('forum/index', array(
            'boards' => $boards
        ));
    }

    /**
     * Topic search action (use in the form action)
     */
    public function search() {
        $porder = $torder = $pcriteria = null;

        if ($_POST['searchtype'] == 'adv') {
            if (isset($_POST['search']) && isset($_POST['usearch'])) {
                $pcriteria = "title= '" . $_POST['search'] . "' AND author='" . $_POST['usearch'] . "'";
            } else if (isset($_POST['search'])) {
                $pcriteria = "title= '" . $_POST['search'] . "'";
            } else if (isset($_POST['usearch'])) {
                $pcriteria = "author= '" . $_POST['usearch'] . "'";
            }

            switch ($_POST['searchorder']) {
                case 'dataasc':
                    $porder = 'ORDER BY created ASC';
                    $torder = 'ORDER BY `date` ASC';
                    break;
                case 'datades':
                    $porder = 'ORDER BY created DESC';
                    $torder = 'ORDER BY `date` DESC';
                    break;
                case 'abc':
                    $porder = $torder = 'ORDER BY title';
                    break;
            }


            $found = Post::model()->findAll($pcriteria, $porder);
            foreach ($found as $post) {
                $post->thread = Thread::model()->findByPk($post->threadID);
            }
        } else if ($_POST['searchtype'] == 'regular') {
            
        }

        $this->render('forum/search-results', array('found' => $found));
    }

    public function advsearch() {
        //fazer pesquisa e apresentar resultados
        $this->render('forum/search');
    }

    /**
     * Topics for a given board
     */
    public function board() {
        $board = Board::model()->findByPk($_GET["id"]);

        $this->render('forum/board', array(
            'boardID' => $board->boardID,
            'boardTitle' => $board->title,
            'threads' => $board->loadThreads()
        ));
    }

    /**
     * Thread data
     */
    public function thread() {
        $thread = Thread::model()->findByPk($_GET["id"]);
        $posts = $thread->loadPosts();

        $this->render('forum/thread', array(
            'threadID' => $thread->threadID,
            'title' => $thread->title,
            'posts' => $posts
        ));
    }

    public function reply() {
        $post = new Post();

        $post->title = $_POST['title'];
        $post->post = $_POST['message'];

        $date = date('Y-m-d H:i:s');
        $post->created = $date;
        $post->modified = $date;

        $post->threadID = intval($_POST['threadID']);
        $post->authorID = System::app()->getUser()->id;

        if (!$post->save()) {
            echo "Resposta inválida";
            echo "<a href=" . $this->createUrl(array('c' => 'forum', 'a' => 'thread'), array('id' => $post->threadID)) . ">Continuar</a> ";
            die;
        }

        $this->redirect(array('c' => 'forum', 'a' => 'thread'), array('id' => $post->threadID));
    }

    public function newThread() {
        $thread = new Thread();
        $boardID = intval($_GET['bid']);
        
        if (isset($_POST['Thread'])){
            
            $threadData = $_POST['Thread'];
            $post = new Post();

            $thread->title = $post->title = $threadData['title'];
            $post->post = $threadData['message'];

            $date = date('Y-m-d H:i:s');
            $thread->date = $post->created = $date;
            $post->modified = $date;
            $thread->boardID = intval($threadData['boardID']);

            $thread->authorID = $post->authorID = System::app()->getUser()->id;
            if (!$thread->save() && !$post->save()) {
                echo "Resposta inválida";
                echo "<a href=" . $this->createUrl(array('c' => 'forum', 'a' => 'thread'), array('id' => $post->threadID)) . ">Continuar</a> ";
                die;
            }
            $this->redirect(array('c' => 'forum', 'a' => 'thread'), array('id' => $thread->threadID));
        }

        //$this->redirect(array('c' => 'forum', 'a' => 'thread'), array('id' => $post->threadID));

        $this->render('forum/newthread', array('boardID' => $boardID));
    }

}

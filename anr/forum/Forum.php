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
        $this->render('forum/index');
    }

    /**
     * Topic search action (use in the form action)
     */
    public function search() {
        $this->render('forum/search');
    }

    /**
     * Show search results
     */
    public function searchResults() {
        $this->render('forum/search-results');
    }

    /**
     * Topics for a given board
     */
    public function board() {
        $this->render('forum/board');
    }

    /**
     * Thread data
     */
    public function thread() {
        //carregar todos os posts desta thread (thread ID)
        //passar a lista para a vista
        $thread = Thread::model()->findByPk($_GET["id"]);
        
        $this->render('forum/thread', array(
            'threadID' => $thread->threadID, 
            'title' => $thread->title,
            'posts' => $thread->loadPosts()
                ));
    }
    
    public function reply(){
        
        $post = new Post();
        
        $post->threadID = $_POST['threadID'];
        $post->post = $POST['reply'];
        $post->authorID = $_SESSION['id'];
        $post->threadID = $_POST['threadID'];
        $post->title = $POST['reply'];
        $post->created = date('Y-m-d H:i:s');
        $post->modified = date('Y-m-d H:i:s');
        
        $post->save();
        
        $this->redirect(array('c' => 'forum', 'a' => 'thread'), array('id' => $post->threadID));
    }
}


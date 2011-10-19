<?php

/* Controller.php
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

abstract class Controller {

    private $view;

    public function __construct($layout = 'site') {
        $this->view = new View($this, $layout);
    }

    /**
     *
     * @param View $view
     * @param array $data
     * @param boolean $return 
     * 
     * @see View::render()
     */
    public function render($view, $data = array(), $return = false) {
        $this->view->render($view, $data, $return);
    }

    /**
     *
     * @return View 
     */
    public function getView() {
        return $this->view;
    }

}

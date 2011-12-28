<?php

/* Game.php
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

class Game extends Controller {

    public function __construct() {
        parent::__construct('game');
    }

    public function index() {
        $this->render('game/index');
    }

    public function charCreation() {

        //max de pontos base
        //valor aleatorio de pontos para gastar

        $rweight = rand(1, 60);
        $rstrenght = rand(1, 60);
        $rdefense = rand(1, 60);
        $rintellect = rand(1, 60);
        $rluck = rand(1, 60);
        $rhealth = rand(1, 60);

        $this->render('game/create-char-step2', array(
            'weight' => $rweight, 'strenght' => $rstrenght, 
            'defense' => $rdefense, 'intellect' =>$rintellect,
            'luck' =>$rluck, 'health' =>$rhealth            
        ));
    }

}
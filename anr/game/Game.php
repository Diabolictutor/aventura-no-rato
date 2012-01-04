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
        if (isset($_POST['step'])) {

            //if(!isset($_SESSION['charcreation']))  {  
            //}

            switch (intval($_POST['step'])) {
                case 1:
                    $this->render('game/create-char-step1');
                    break;
                case 2:
                    $max = 20;

                    $rands = (object) array(
                                'weight' => rand(1, $max),
                                'strenght' => rand(1, $max),
                                'defense' => rand(1, $max),
                                'intellect' => rand(1, $max),
                                'luck' => rand(1, $max),
                                'health' => rand(1, $max)
                    );

                    $this->render('game/create-char-step2', array(
                        'stats' => $rands
                    ));
                    break;
                case 3:
                    break;
            }
        } else {
            $this->render('game/create-char-step1');
        }

        //3 passos: passo 1 dados base, passo 2 caracterisitas, passo 3 confirmação
        //decidir em que passo estou
        //
        //passo 0
        //carregar imagens para portraits
        //guardar dados que existam
        //apresentar vista passo 1
        //passo 2
        //guardar dados que existam
        //gerar pontos aleatórios para os atributos, se não existerem gravados
        //apresentar vista passo 2
        //passo 3
        //guardar dados que existam
        //apresentar vista passo 3
        //max de pontos base
        //valor aleatorio de pontos para gastar
    }

}
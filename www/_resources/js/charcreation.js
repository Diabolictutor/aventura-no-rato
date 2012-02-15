/* charcreation.js
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

function initSliders() {  
    $('.slider-weight').slider({
        min: 1,
        max: 20,
        value: $('#weight').val(),
        slide: function(event, ui) {
            $('#weight').val($(this).slider('value'));
        }
    });
    
    $('.slider-strenght').slider({
        min: 1,
        max: 20,
        value: $('#strenght').val()
    });
    
    $('.slider-defense').slider({
        min: 1,
        max: 20,
        value: $('#defense').val()
    });
    $('.slider-intellect').slider({
        min: 1,
        max: 20,
        value: $('#intellect').val()
    });   
    $('.slider-luck').slider({
        min: 1,
        max: 20,
        value: $('#luck').val()
    });
    $('.slider-health').slider({
        min: 1,
        max: 20,
        value: $('#health').val()
    });
        
}

function nextPortrait() {
    $.ajax({
        url: "",
        success: function(){
            
        }
    });
//$('#portrait').attr('src', '_resources/images/game/portraits/male/portrait-m20');
    
}

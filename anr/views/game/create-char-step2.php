<?php
$this->registerScript("$('.slider').slider();", View::$POS_INIT);
?>
<div id="create-char">
    <form action="#" method="post">
        <div class="widget-left">
            <label>Weight</label>
            <input type="text" name="weight" id="weight" size="1" />          
        </div>
        <div class="slider"></div>
        <div class="clear"></div>

        <label>Strenght</label>
        <input type="text" name="strenght" id="strenght" size="1" />
        <div class="slider"></div>
        <label>Defense</label>
        <input type="text" name="defense" id="defense" size="1" />
        <div class="slider"></div>
        <label>Intellect</label>  
        <input type="text" name="intellect" id="intellect" size="1" />
        <div class="slider"></div>
        <label>Luck</label>  
        <input type="text" name="luck" id="luck" size="1" />
        <div class="slider"></div>
        <label>Health</label>     
        <input type="text" name="health" id="health" size="1" />        
        <div class="slider"></div>
        <button type="submit">botao para gerar valores aleatorios</button>
        <input type="hidden" value="2" name="step2" />botao para avançar
        
                <p>
            <button type="submit">Sub</button>
        </p>
        <input type="hidden" value="1" name="step" />
    </form>
</div>
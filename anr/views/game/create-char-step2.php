<?php
$js = <<<JSCODE
$('.slider').slider();
JSCODE;

$this->registerScript($js, View::$POS_INIT);
?>
<div id="create-char">
    <form action="#" method="post">
        <div class="widget-left">
            <label>Weight</label> 
            <input type="text" name="weight" id="weight" size="1" />       
        </div>
        <div class="slider"></div>
        <div class="clear"></div>

        <div class="widget-left">
            <label>Strenght</label>
            <input type="text" name="strenght" id="strenght" size="1" />
        </div>
        <div class="slider"></div>
        <div class="clear"></div>

        <div class="widget-left">
            <label>Defense</label>
            <input type="text" name="defense" id="defense" size="1" />
        </div>
        <div class="slider"></div>
        <div class="clear"></div> 

        <div class="widget-left">
            <label>Intellect</label>  
            <input type="text" name="intellect" id="intellect" size="1" />
        </div>
        <div class="slider"></div>
        <div class="clear"></div>    

        <div class="widget-left">
            <label>Luck</label>  
            <input type="text" name="luck" id="luck" size="1" />
        </div>
        <div class="slider"></div>
        <div class="clear"></div>  

        <div class="widget-left">
            <label>Health</label>     
            <input type="text" name="health" id="health" size="1" />     
        </div>
        <div class="slider"></div>
        <div class="clear"></div> 
        
        <p>
            <button type="submit">Submit</button>
        </p>
        <input type="hidden" value="2" name="step" />
    </form>
</div>
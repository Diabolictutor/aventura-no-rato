<?php
$this->registerScriptFile('_resources/js/charcreation.js');

$this->registerScript('initSliders()', View::$POS_INIT);
?>
<div id="create-char">
    <form action="<?php echo $this->createURL(array('c' => 'game', 'a' => 'charcreation')); ?>" method="POST">
        <fieldset>
            <legend>Character Wizard (2/3)</legend>
            <div class="widget-left">
                <label>Weight</label> 
                <input type="text" name="weight" id="weight" size="4" value="<?php echo $this->stats->weight; ?>" />
            </div>
            <div class="slider-weight"></div>
            <div class="clear"></div>

            <div class="widget-left">
                <label>Strenght</label>
                <input type="text" name="strenght" id="strenght" size="4" value="<?php echo $this->stats->strenght; ?>" />
            </div>
            <div class="slider-strenght"></div>
            <div class="clear"></div>

            <div class="widget-left">
                <label>Defense</label>
                <input type="text" name="defense" id="defense" size="4" value="<?php echo $this->stats->defense; ?>" />
            </div>
            <div class="slider-defense"></div>
            <div class="clear"></div> 

            <div class="widget-left">
                <label>Intellect</label>  
                <input type="text" name="intellect" id="intellect" size="4" value="<?php echo $this->stats->intellect; ?>" />
            </div>
            <div class="slider-intellect"></div>
            <div class="clear"></div>    

            <div class="widget-left">
                <label>Luck</label>  
                <input type="text" name="luck" id="luck" size="4" value="<?php echo $this->stats->luck; ?>" />
            </div>
            <div class="slider-luck"></div>
            <div class="clear"></div>  

            <div class="widget-left">
                <label>Health</label>     
                <input type="text" name="health" id="health" size="4" value="<?php echo $this->stats->health; ?>"/>     
            </div>
            <div class="slider-health"></div>
            <div class="clear"></div>
        </fieldset>
        <p>
            <button type="submit"><img src="_resources/images/game/interface/previous.38x40.png" /></button>
            <button type="submit"><img src="_resources/images/game/interface/next.38x40.png" /></button>
        </p>
        <input type="hidden" value="3" name="step" id="step" />
    </form>
</div>
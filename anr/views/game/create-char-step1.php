<?php $this->registerScriptFile('_resources/js/charcreation.js'); ?>

<div id="create-char">
    <form action="<?php echo $this->createURL(array('c' => 'game', 'a' => 'charcreation')); ?>" method="POST">
        <fieldset>
            <legend>Character Wizard (1/3)</legend>
            <p>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" />
            </p>
            
            <p>
                Sex:
                <input type="radio" name="sex" id="smale" class="nofloat" /> Male                
                <input type="radio" name="sex" id="sfemale" class="nofloat" /> Female              
            </p>

            <p>
                <label for="portrait"></label>
                <img src="_resources/images/game/portraits/<?php echo $this->sex, '/', $this->portrait; ?>" id="portrait"/>
                <a href="javascript:nextPortrait();"><img src="#" id="previous" /></a>
                <a href="#"><img src="#" id="next" /></a>
            </p>
        </fieldset>
        <p>
            <button type="submit" name="step"><img src="_resources/images/game/interface/next.38x40.png" /></button>
        </p>
        <input type="hidden" value="2" name="step" />
    </form>
</div>
<?php $this->registerScriptFile('_resources/js/charcreation.js'); ?>

<div id="create-char">
    <form action="<?php echo $this->createURL(array('c' => 'game', 'a' => 'charcreation')); ?>" method="POST">
        <fieldset>
            <legend>Character Wizard (1/3)</legend>
            <div class="form-row">
                <label for="Character[name]">Name</label>
                <input type="text" name="Character[name]" id="name" />
            </div >

            <div class="form-row">
                <label for="Character[sex]">Sex</label>
                <input type="radio" name="Character[sex]" id="smale"  class="form-row" value="" /> Male                
                <input type="radio" name="Character[sex]" id="sfemale" class="form-row" value="" /> Female              
            </div>

            <div class="form-row">
                <label>Portrait</label>
                <div id="portrait">
                    <img src="_resources/images/game/portraits/<?php echo $this->sex, '/', $this->portrait; ?>"
                         id="portraitImg" width="320" height="240" />
                    <br />
                    <a id="previous" href="javascript:;" onclick="previousPortrait();">
                        <img src="_resources/images/game/interface/previous.30x34.png" />
                    </a>
                    <a id="next" href="javascript:;" onclick="nextPortrait();">
                        <img src="_resources/images/game/interface/next.30x34.png" />
                    </a>

                </div>
                <div class="clear"></div>
            </div>

        </fieldset>
        <div class="form-row">
            <button type="submit" name="step"><img src="_resources/images/game/interface/next.38x40.png" /></button>
        </div>
        <input type="hidden" value="2" name="step" />
    </form>
</div>
<?php
$this->registerScriptFile('_resources/js/charcreation.js');
$nextPortraitUrl = $this->createURL(array('c' => 'game', 'a' => 'getnextportrait'));
?>

<div id="create-char">
    <form id="formStep1" action="<?php echo $this->createURL(array('c' => 'game', 'a' => 'charcreation'), array('step1')) ?>" method="POST">
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
                    <a id="previous" href="javascript:$previousPortraitUrl = $this->createURL(array('c' => 'game', 'a' => 'getpreviousportrait'));
                       ;" onclick="previousPortrait('<?php echo $previousPortraitUrl; ?>');">
                        <img src="_resources/images/game/interface/previous.30x34.png" />
                    </a>
                    <a id="next" href="javascript:$nextPortraitUrl = $this->createURL(array('c' => 'game', 'a' => 'getnextportrait'));
                       ;" onclick="nextPortrait('<?php echo $nextPortraitUrl; ?>');">
                        <img src="_resources/images/game/interface/next.30x34.png" />
                    </a>

                </div>
                <div class="clear"></div>
            </div>

        </fieldset>
        <div class="form-row" id="nextStepDiv">
            <a href="#">Cancel</a>
            <a href="javascript:;" onclick="submitStepOne();" id="nextStep">
                <img src="_resources/images/game/interface/next.30x34.png" />
            </a>
        </div>

    </form>
</div>
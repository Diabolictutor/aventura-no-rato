<div id="create-char">
    <form action="<?php echo $this->createURL(array('c' => 'game', 'a' => 'charcreation')); ?>" method="POST">
        <fieldset>
            <legend>Character Wizard (1/3)</legend>
            <p>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" />
            </p>
            <p>
                <label for="portrait">Portrait</label>         
                <img src="#" id="portrait"/>
                <a href="#"><img src="#" id="previous" /></a>
                <a href="#"><img src="#" id="next" /></a>
            </p>
        </fieldset>
        <p>
            <button type="submit" name="step"><img src="_resources/images/game/interface/next.38x40.png" /></button>
        </p>
        <input type="hidden" value="2" name="step" />
    </form>
</div>
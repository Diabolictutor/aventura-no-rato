<?php echo $this->includeViewFile('administration/_admin-menu'); ?>
<div id="edit-character">
    <form action="<?php echo $this->createUrl(array('c' => 'administration', 'a' =>'editChar')); ?>" 
          method="POST">
        <fieldset>
            <legend>Edit Character</legend>
            <p>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" />
            </p>
            <p>
                <label for="level">Level:</label>
                <input type="text" name="level" id="level" />
            </p>
            <p>
                <input type="submit" value="Submit" />
                <input type="hidden" name="Character" />
            </p>
        </fieldset>
    </form>
</div>

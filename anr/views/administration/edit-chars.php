<?php echo $this->includeViewFile('administration/_admin-menu'); ?>
<div id="edit-character">
    <form action="<?php echo $this->createUrl(array('c' => 'administration', 'a' => 'editChar')); ?>" 
          method="POST">
        <fieldset>
            <legend>Edit Character</legend>

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" />

            <label for="level">Level:</label>
            <input type="text" name="level" id="level" />
        </fieldset>
        <input type="submit" value="Submit" />

        <input type="hidden" name="Character" />
    </form>
</div>

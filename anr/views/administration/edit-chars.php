<?php echo $this->includeViewFile('administration/_admin-menu'); ?>
<div id="edit-character">
    <!-- //TODO: proper action for this form -->
    <form action="<?php echo $this->createURL(array('c' => 'administration', 'a' =>'')); ?>" method="POST">
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
            </p>
        </fieldset>
    </form>
</div>

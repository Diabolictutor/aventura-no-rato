<form action="<?php
echo $this->createURL(array(
    'c' => 'administration',
    'a' => 'editboard'
        ), array('boardID' => $this->board->boardID));
?>" method="POST">
    <fieldset>
        <legend>Edit Board</legend>
        <p>
            <label for="title">Title:</label><br />
            <input type="text" name="title" id="title" class="text" value="<?php $this->board->title; ?>" />
        </p>
        <p>
            <label for="title">Position:</label><br />
            <input type="text" name="position" id="edit-board" class="text" value="<?php $this->board->position; ?>" />
        </p>
    </fieldset>
    <input type="submit" value="<?php echo ($this->board->newRecord ? 'Create' : 'Save'); ?>" name="Board" />
</form>
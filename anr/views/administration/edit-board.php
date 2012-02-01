<form action="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'editboard'), array('id' => $this->board->boardID)); ?>" method="POST">
    <fieldset>
        <legend>Create/Edit Board</legend>
        <p>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="text" value="<?php echo $this->board->title; ?>" />
        </p>
        <p>
            <label for="title">Position:</label>
            <input type="text" name="position" id="edit-board" class="text" value="<?php echo $this->board->position; ?>" />
        </p>
    </fieldset>
    <input type="submit" value="<?php echo ($this->board->newRecord ? 'Create' : 'Save'); ?>" name="Board" />
    <input type="hidden" name="Board" />
    <a href="<?php echo $this->createURl(array('c' => 'administration', 'a' => 'editboard')); ?>"></a>
</form>
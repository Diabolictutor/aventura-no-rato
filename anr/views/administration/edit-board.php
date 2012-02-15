<form action="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'editboard'), array('id' => $this->board->boardID)); ?>" method="POST">
    <fieldset>
        <legend><?php echo ($this->board->newRecord ? 'Create' : 'Edit'); ?> Board</legend>
        <div class="form-row">
            <label for="title">Title</label>
            <input type="text" 
                   name="Board[title]" 
                   id="title" 
                   value="<?php echo $this->board->title; ?>" />
        </div>
        <div class="form-row">
            <label for="title">Position</label>
            <input type="text" 
                   name="Board[position]" 
                   id="position" 
                   value="<?php echo $this->board->position; ?>" />
        </div>
    </fieldset>
    <div class="form-row">
        <input type="submit" value="<?php echo ($this->board->newRecord ? 'Create' : 'Save'); ?>" />
        <a href="<?php echo $this->createUrl(array('c' => 'administration')) ?>" class="cancel-link">Cancel</a>
    </div>
</form>

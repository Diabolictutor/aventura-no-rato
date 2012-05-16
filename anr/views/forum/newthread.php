<div id="newthread">
    <form action="<?php echo $this->createUrl(array('c' => 'forum', 'a' => 'newthread')); ?>" method="POST">

        <label for="title">Title:</label>
        <input type="text" id="title" name="Thread[title]" value="<?php echo $this->title; ?>" />

        <label for="message">Message:</label>
        <textarea name="Thread[message]" rows="5" cols="255" id="message"></textarea>

        <input type="submit" value="Send" />
        <input type="hidden" name="Thread[boardID]" value="<?php echo $this->boardID; ?>" />
    </form>
</div>
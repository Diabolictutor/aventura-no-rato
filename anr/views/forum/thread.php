<div>
    <?php foreach ($this->posts as $post) { ?>
        <div>
            <h2 id="thtitle"><?php echo $post->title; ?></h2>
            <div id="postframe">
                <div id="userol">
                    <div id="userimg"></div>
                    <div id="useril"><?php echo $post->author->name; ?></div>
                </div>
                <div id="post">
                    <?php echo $post->post; ?>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div> 
    <?php } ?>
</div>
<div id="reply">
    <form action="<?php echo $this->createUrl(array('c' => 'forum', 'a' => 'reply')); ?>" method="POST">
        <label for="title">Title:</label><input type="text" id="title" name="title" value="RE: <?php $this->title ?>"/>
        
        <label for="message">Reply:</label><br />
        <textarea name="message" rows="5" cols="255" id="message"></textarea>
        
        <input type="submit" value="Send" />

        <input type="hidden" name="threadID" value="<?php echo $this->threadID; ?>" />
    </form>
</div>
<div>
    <div>
        <h2>Board Name</h2>
    </div>
    <div style="clear:both;"></div>
    <div class="board">
        <ul>
            <?php /* FOREACH */ ?>
            <li><a href="<?php echo $this->createUrl(); ?>">
                    "<?php echo $thread->title; ?>" 
                    by "<?php echo $thread->author; ?>" 
                    on "<?php echo $thread->data; ?>"</a></li>
            <?php ?>
        </ul>
    </div>
</div>

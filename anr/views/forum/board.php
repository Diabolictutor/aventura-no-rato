<?php $this->title = $this->boardTitle; ?>
<div>
    <div>
        <h2><?php echo $this->boardTitle; ?></h2>
    </div>    
    <div>
        <h2><a href="<?php echo $this->createUrl(array("c" => "forum", "a" => "newthread"), array('bid' => $this->boardID)); ?>">New Thread</a></h2>
    </div>    
    <div style="clear:both;"></div>
    <div class="board">
        <ul>
            <?php foreach ($this->threads as $thread) {?>
            <li><a href="<?php echo $this->createUrl(array("c" => "forum", "a" => "thread"),array("id" => $thread->threadID)); ?>">
                    <?php echo $thread->title; ?> </a>
                    by <?php echo $thread->author->name; ?> 
                    on <?php echo $thread->date; ?></li>
            <?php }?>
        </ul>
    </div>
</div>

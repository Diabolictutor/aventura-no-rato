<!-- //TODO: css to css file -->
<div>
    <?php foreach ($this->boards as $board) { 
        $threadData = $board->latestPost($board->boardID);
        ?>
        <div>
            <h2><a href="<?php echo $this->createUrl(array("c" => "forum", "a" => "board"),array("id" => $board->boardID));?>"><?php echo $board->title; ?></a></h2>
            <div class="tc">Thread Count: <?php echo $board->countThreads(); ?></span></div>
        </div>
        <div style="clear:both;"></div>
        <div class="boardContent">
            <ul>
                <li>
                    <a href="<?php echo $this->createUrl(array('c' => 'forum', 'a' => 'thread'), array('id' => $threadData->threadID)); ?>">
                    <?php echo $threadData->title;?><img src="_resources/images/icons/arrow-curve-000-double.png" style="float:right;"/>
                    </a>
                    </li>
            </ul>
        </div><?php } ?>
</div>
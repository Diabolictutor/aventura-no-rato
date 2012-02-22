<?php echo $this->includeViewFile('administration/_admin-menu'); ?>

<div id="board-list" class="admin-content">
    <h2>Boards
        <a class="tools" href="<?php echo $this->createUrl(array('c' => 'administration', 'a' => 'editboard')); ?>" >
            <img src="_resources/images/icons/application--plus.png" />
        </a>
    </h2>
    <div class="clear"></div>
    <ul>
        <?php foreach ($this->boards as $board) { ?>
            <li style="clear:both">
                <a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'editboard'), array('id' => $board->boardID)); ?>">
                    <?php echo $board->title; ?>
                </a>
                <span class="admin-span">
                    <a href="<?php echo $this->createUrl(array('c' => 'administration', 'a' => 'editboard')); ?>">
                        <img src="_resources/images/icons/application--pencil.png" />
                    </a>
                    <a href="<?php echo $this->createUrl(array('c' => 'administration', 'a' => 'deleteboard'), array('id' => $board->boardID)); ?>">
                        <img src="_resources/images/icons/application--minus.png" />
                    </a>
                </span>
            </li>
        <?php } ?>
    </ul>
</div>
<div class="clear"></div>
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
            <li>
                <a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'editboard'), array('id' => $board->boardID)); ?>">
                    <?php echo $board->title; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>
<div class="clear"></div>
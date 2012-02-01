<?php echo $this->includeViewFile('administration/_admin-menu'); ?>
<div id="board-list">
    <a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'editboard')); ?>"
       class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only">
        Add
    </a>
    <ul>
        <?php foreach ($this->boards as $board) { ?>
            <li>
                <a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'editboard'), array('id' => $board->boardID)); ?>"
                   class="">
                       <?php echo $board->title; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>
<div class="clear"></div>
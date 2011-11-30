<div id="board-list">
    <a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'editboard')); ?>">
        Inserir
    </a>
    <ul>
        <?php foreach ($this->boards as $board) { ?>
            <li>
                <a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'editboard'), array('id' => $board->boardID)); ?>" alt="">
                    <?php echo $board->title; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>
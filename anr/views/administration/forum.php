<div id="board-list">
    <ul>
        <a href="<?php echo $this->createURL(array('c' => 'administration', 'a' => 'editboard')); ?>">
           Inserir
    </a>          
        <?php foreach ($this->boards as $board) { ?>
            <li>
                <a href="<?php
        echo $this->createURL(
                array('c' => 'administration', 'a' => 'editboard')
                , array('id' => $board->boardID)
        );
            ?>" alt="">
                       <?php echo $board->title; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>